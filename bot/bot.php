<?php

$this->profix = "$";
if ($this->message === $this->profix) {
	array_push($this->data, ["bot"=>array("username"=>" BOT SAYSER","profile"=>"bot.jpeg","message"=>"หากคุณต้องการใช้พิมพ์" .  $this->profix .  "helpได้เลย")]);
}

if (str_starts_with($this->message, $this->profix . "help")) {
	array_push($this->data, ["bot"=>array("username"=>" BOT SAYSER","profile"=>"bot.jpeg","message"=>$this->profix . "help <br> " . $this->profix . "portfolio <br> " . $this->profix . "profile")]);
}

if (str_starts_with($this->message, $this->profix . "profile")) {
	$this->backgroud = array(
"img1"=>"img1.jpeg",
"img2"=>"img2.jpeg",
"img3"=>"img3.jpeg",
"img4"=>"img4.jpeg",
"img5"=>"img5.jpeg",
"img6"=>"img6.jpeg",
"img7"=>"img7.jpeg",
"img8"=>"img8.jpeg",
"img9"=>"img9.jpeg",
"img10"=>"img10.jpeg",
"img11"=>"img11.jpeg",
"img12"=>"img12.jpeg",
"img13"=>"img13.jpeg"
);
    $this->color = array(
"color1"=>"#00FF4C",
"color2"=>"#00C7FF",
"color3"=>"#4400FF",
"color4"=>"#FF00F9",
"color5"=>"#FF0000",
"color6"=>"#FF6300",
"color7"=>"#FFFC00"
);
    $this->ramdom_backgroud = array_rand($this->backgroud );
    $this->ramdom_color = array_rand($this->color);
	array_push($this->data, ["bot_profile"=>array(
"username"=>" BOT SAYSER",
"profile"=>"bot.jpeg",
"image"=>$_SESSION["image-x"],
"username_user"=>$this->username,
"email_user"=>$this->email,
"backgroud"=>$this->backgroud[$this->ramdom_backgroud],
"color"=>$this->color[$this->ramdom_color]
)]);
}

if (str_starts_with($this->message, $this->profix . "portfolio")) {
	 array_push($this->data, ["portfolio"=>array("username"=>" BOT SAYSER","profile"=>"bot.jpeg","image"=>"sayser.jpg")]);
}

?>