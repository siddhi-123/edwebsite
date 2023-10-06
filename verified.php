<?php
session_start();
include("edconfig.php");
if(isset($_GET['email_id']) && isset($_GET['v_code']))
{
    $query="SELECT * FROM users WHERE email_id='$_GET[email_id]' AND verification_code='$_GET[v_code]'";
    $result=mysqli_query($conn,$query);
    if($result);
    {
        if(mysqli_num_rows($result)==1)
        {
            $result_fetch=mysqli_fetch_assoc($result);
            if($result_fetch['is_verified']==0)
            {
                $update="UPDATE users SET is_verified='1' WHERE email_id='$result_fetch[email_id]'";
                if(mysqli_query($conn,$update)){
                    echo"
                    <script>
                        alert('Email Verification Successful');
                        window.location.href='login.php';
                    </script>
                    ";
                }
                else{
                    echo"
                    <script>
                        alert('Cannot run query');
                        window.location.href='index.php';
                    </script>
                    ";
                }
            }
            else{
                echo"
                <script>
                    alert('Cannot run query');
                    window.location.href='index.php';
                </script>
                ";
            }
        }
    }
}
?>