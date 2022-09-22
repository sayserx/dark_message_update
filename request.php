<?php
session_start();
header("location: message.php");


class main {
	
	function message($message,$username,$email,$image_profile) {
		if (isset($_POST["button"])) {
		  $this->file = file_get_contents('message.json');
		  $this->data = json_decode($this->file);
		   $this->emoji = "⚡";
		  if (isset($message)) {
		    $this->message = $message;
		    $this->username = $username;
		    $this->email = $email;
		    $this->image_profile = $image_profile;
		    // emoji 
		    if (empty($this->message)) {
		      array_push($this->data, array(
              "username"=>$this->username,
              "profile"=>$this->image_profile,
              "emoji"=>$this->emoji
              ));
		    } else {
		      // message
		      array_push($this->data, array(
		      "username"=>$this->username,
		      "profile"=>$this->image_profile,
		      "message"=>$this->message
		      ));
		    }
		    //bot 
		    include ("./bot/bot.php");
		    // update json
		    $this->json = json_encode ($this->data, JSON_PRETTY_PRINT);
            file_put_contents('message.json', $this->json);
		  }
		}
	}  // function main
	function image_video($username,$image_profile,$file) {
		if (isset($file)) {
			$this->file = file_get_contents('message.json');
		    $this->data = json_decode($this->file);
			$this->username = $username;
			$this->image_profile = $image_profile;
			$this->name_file_image_video = $file["name"];
			$this->file_x = $file;
			// image 
			if (str_starts_with($this->file_x["type"] , 'image')) {
			if (move_uploaded_file($this->file_x["tmp_name"], "image/".$this->name_file_image_video)) {
				array_push($this->data, array(
                    "username"=>$this->username,
                    "profile"=>$this->image_profile,
                    "image"=>$this->name_file_image_video
                   ));
                   $this->json = json_encode ($this->data, JSON_PRETTY_PRINT);
                   file_put_contents('message.json', $this->json);
				}
			  } // something like image
			if (str_starts_with($this->file_x["type"] , 'video')) {
				  $this->name_file_image_video = "sayser_video_" . (rand()) . ".mp4";
				   if (move_uploaded_file($this->file_x["tmp_name"], "video/".$this->name_file_image_video)) {
					 array_push($this->data, array(
                     "username"=>$this->username,
                     "profile"=>$this->image_profile,
                      "video"=>$this->name_file_image_video
                      ));
                      $this->json = json_encode ($this->data, JSON_PRETTY_PRINT);
                      file_put_contents('message.json', $this->json);
					}
				}
		}
	}
	
	function download($username,$profile_image,$file) {
		$this->username = $username;
		$this->profile_image = $profile_image;
		$this->file_download = $file["name"];
		$this->file_O_O = $file;
		$this->size = $file["size"];
		$this->file = file_get_contents('message.json');
		$this->data = json_decode($this->file);
		
		// php
		if (str_starts_with($this->file_O_O["type"], 'application/octet-stream')) {
			$this->file_download = "file_php_" . (rand()) . ".php";
			}
		// javascript
		if (str_starts_with($this->file_O_O["type"] , 'text/javascript')) {
			$this->file_download = "file_javascript_" . (rand()) . ".js";
		   }
		// python 
		if (str_starts_with($this->file_O_O["type"] , 'text/x-python')) {
			$this->file_download = "file_python_" . (rand()) . ".py";
			}
		// java
		if (str_starts_with($this->file_O_O["type"] , 'text/x-java')) {
		   $this->file_download = "file_java_" . (rand()) . ".java";
		}
		
		if (move_uploaded_file($this->file_O_O["tmp_name"], "download_sayser/".$this->file_download)) {
		    array_push($this->data, array(
                     "username"=>$this->username,
                     "profile"=>$this->profile_image,
                      "download"=>$this->file_download,
                      "size"=>$this->size
                      ));
            $this->json = json_encode ($this->data, JSON_PRETTY_PRINT);
            file_put_contents('message.json', $this->json);
		} 
	}
} // class main

$run = new main();

if (isset($_POST["message"])) {
$run->message(
$_POST["message"],
$_SESSION["username"],
$_SESSION["email"],
$_SESSION["image-x"]
);
}

if (isset($_FILES["image"])) {
$run->image_video(
$_SESSION["username"],
$_SESSION["image-x"],
$_FILES["image"]
);
}

if (isset($_FILES["download"])) {
$run->download(
$_SESSION["username"],
$_SESSION["image-x"],
$_FILES["download"]
);
}

?>