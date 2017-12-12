<?php
session_start();
echo "In pre_dash page";


function fetchData(){
    
        $client_id = "4121dae809fdd1bbec46";
        $redirect_url = "http://nmala001.cs518.cs.odu.edu/dashboard.php";
    
        if($_SERVER['REQUEST_METHOD']=='GET'){
    
            if(isset($_GET['code'])){
    
                $code = $_GET['code'];
                $post = http_build_query(array(
    
                    'client_id' => $client_id,
                    'redirect_url' => $redirect_url,
                    'client_secret' => 'b8194c65ca1393fcb1d9325ac22a222886316041',
                    'code' => $code,
    
    
                    ));
            }
    
            $access_data = file_get_contents("http://github.com/login/oauth/access_token?" .$post);
            $exploded1 = explode('access_token=', $access_data);
            $exploded2 = explode('$scope=user', $exploded[1]);
            $access_token = $exploded2[0];
    
            $opts = ['http' =>[
    
                      'method' => 'GET',
                      'header' => ['User-Agent: PHP']
    
            ]
    
            ];
    
            //fetching user data
    
            $url = "https://api.github.com/user?access_token =" .$access_token;
            $context = stream_context_create($opts);
            $data = file_get_contents($url, false, $context);
            $user_data = json_decode($data, true);
            $username = $user_data['login'];
    
            //fetching email data
    
            $url1 = "https://api.github.com/user?access_token =" .$access_token;
            $emails = file_get_contents($url1, false, $context);
            $emails = json_decode($emails, true);
    
            $email = $emails[0];
    
            $userPayLoad = [
    
            'username' => $username,
            'email' => $email,
            'fetched_from' => "github"
    
            ];
          
          //$_SESSION['userId'] = $user_id;
    
            $_SESSION['payload'] =$userPayLoad;
    
            $_SESSION['userName'] = $username;

            header("location: dashboard.php");
    
           // return $userPayLoad;
    
    
    
    
        }else{
    
            die('error');
        }
    
    
    
    }

fetchdata();
?> 
