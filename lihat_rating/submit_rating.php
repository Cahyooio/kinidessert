
<?php
 date_default_timezone_set("Asia/Jakarta");
//submit_rating.php

$connect = new PDO("mysql:host=localhost;dbname=ecom_store", "root", "");

if(isset($_POST["rating_data"]))
{
	 
	$data = array(
		':product_id'=>	$_POST["product_id"],
		':order_id'=>	$_POST["order_id"],
		':user_name'		=>	$_POST["user_name"],
		':user_rating'		=>	$_POST["rating_data"],
		':user_review'		=>	$_POST["user_review"],
		':datetime'			=> time()
	);

	$query = "
	INSERT INTO review_table 
	(order_id, product_id, user_name, user_rating, user_review, datetime) 
	VALUES (:order_id, :product_id, :user_name, :user_rating, :user_review, :datetime)
	; UPDATE customer_orders set review_status ='complete' where order_id= :order_id;";

	$statement = $connect->prepare($query);

	$statement->execute($data);

	echo "Review & Rating Dari Anda Telah Kami Terima";

}

                       



if(isset($_POST["action"]))
{
	$product_id = $_POST['product_id'];
	$average_rating = 0;
	$total_review = 0;
	$five_star_review = 0;
	$four_star_review = 0;
	$three_star_review = 0;
	$two_star_review = 0;
	$one_star_review = 0;
	$total_user_rating = 0;
	$review_content = array();

//   disini mal problem nya, udah dapet id product nya tapi bingung manggilnya gimana 

	$query = "
	SELECT * FROM review_table where product_id = '$product_id'
	ORDER BY review_id DESC
	";

	$result = $connect->query($query, PDO::FETCH_ASSOC);

	foreach($result as $row)
	{
		$review_content[] = array(
			'user_name'		=>	$row["user_name"],
			'user_review'	=>	$row["user_review"],
			'rating'		=>	$row["user_rating"],
			'datetime'		=>	date('l jS, F Y h:i:s A', $row["datetime"])
		);

		if($row["user_rating"] == '5')
		{
			$five_star_review++;
		}

		if($row["user_rating"] == '4')
		{
			$four_star_review++;
		}

		if($row["user_rating"] == '3')
		{
			$three_star_review++;
		}

		if($row["user_rating"] == '2')
		{
			$two_star_review++;
		}

		if($row["user_rating"] == '1')
		{
			$one_star_review++;
		}

		$total_review++;

		$total_user_rating = $total_user_rating + $row["user_rating"];

	}

	$average_rating = $total_user_rating / $total_review;

	$output = array(
		'average_rating'	=>	number_format($average_rating, 1),
		'total_review'		=>	$total_review,
		'five_star_review'	=>	$five_star_review,
		'four_star_review'	=>	$four_star_review,
		'three_star_review'	=>	$three_star_review,
		'two_star_review'	=>	$two_star_review,
		'one_star_review'	=>	$one_star_review,
		'review_data'		=>	$review_content
	);

	echo json_encode($output);

}

?>