/* CREATE TABLE `following` (
`user_id` INT NOT NULL ,
`follower_id` INT NOT NULL ,
PRIMARY KEY ( `user_id` , `follower_id` )
) ENGINE = MYISAM ; */

<?php

function check_count($first, $second){
    $sql = "select count(*) from following
            where user_id='$second' and follower_id='$first'";
    $result = mysql_query($sql);

    $row = mysql_fetch_row($result);
    return $row[0];

}
//User follow/unfollow function
function follow_user($me,$them){
    $count = check_count($me,$them);

    if ($count == 0){
        $sql = "insert into following (user_id, follower_id)
                values ($them,$me)";

        $result = mysql_query($sql);
    }
}


function unfollow_user($me,$them){
    $count = check_count($me,$them);

    if ($count != 0){
        $sql = "delete from following
                where user_id='$them' and follower_id='$me'
                limit 1";

        $result = mysql_query($sql);
    }
}

//The following code will display the users that they are following

function show_users($user_id=0){

    if ($user_id > 0){
        $follow = array();
        $fsql = "select user_id from following
                where follower_id='$user_id'";
        $fresult = mysql_query($fsql);

        while($f = mysql_fetch_object($fresult)){
            array_push($follow, $f->user_id);
        }

        if (count($follow)){
            $id_string = implode(',', $follow);
            $extra =  " and id in ($id_string)";

        }else{
            return array();
        }

    }

    $users = array();
    $sql = "select id, username from users
        where status='active'
        $extra order by username";


    $result = mysql_query($sql);

    while ($data = mysql_fetch_object($result)){
        $users[$data->id] = $data->username;
    }
    return $users;
}
?>

<html>
<body>
  <h2>Users you're following</h2>

<?php
$users = show_users($_SESSION['userid']);

if (count($users)){
?>
<ul>
<?php
foreach ($users as $key => $value){
    echo "<li>".$value."</li>\n";
}
?>
</ul>
<?php
}else{
?>
<p><b>You're not following anyone yet!</b></p>
<?php
}
?>
</body>
</html>
