

<!DOCTYPE html>
<html lang="en">
<head>
	<title>Play Matka online  Ashapura of all markets Play Half Sangam</title>
	<meta name="description" content="Play Online Ashapura of all markets Play Half Sangam">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">

	<link rel="stylesheet" href="<?=base_url();?>assets/styles.css" />
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	<link rel="stylesheet" href="<?=base_url();?>assets/dist/css/toast.css" />
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">

	<script>
		function isNumberKey(evt)
		{
			var charCode = (evt.which) ? evt.which : event.keyCode
			if (charCode > 31 && (charCode < 48 || charCode > 57))
				return false;

			return true;
		}
	</script>
		<style>
			body
			{
				/*width: 1050px;*/
				margin:0px auto;
				padding:0px;
				font-family:Tahoma, Times New Roman,"Comic Sans MS",Helvetica,sans-serif;
				font-size:13px;
				color:#000000;
				background-color:#fff;
				max-width: 950px;
				border: 1px solid #999999;
				-moz-box-shadow: 1px 1px 15px #999999;
				-webkit-box-shadow:1px 1px 15px rgb(150,150,150);
				box-shadow:1px 1px 15px rgb(150,150,150);
			}
		</style>
</head>
<body>

<div id="load"></div>
<div class="container-fluid">
	<div class="row">
		<div class="col-sm-12">
			<a href="<?= base_url('/')?>" class="previous">&laquo; Back</a>

		<div align="center" class="satta_2">
				<div style="color: Red;"><span style="color: #F0FFF0;"><span style="font-family: Calibri;"><span style="font-size: x-large;"><strong><em><big><bdo dir="ltr">sattamatkaonlineplay.com</bdo></big></em></strong></span></span></span></div><a href="frontp">sattamatkaonlineplay.com</a>
				<?php
				$setting = $this->functions->getSettingData();
				if($this->session->has_userdata('login')){
					$userData = $this->session->get_userdata('users');
					$wallet_amount = $this->functions->getUserData($userData['user']);
					echo '<h4 style="color: darkblue; font-weight: bold">Wallet Amount: '.$wallet_amount->user_wallet.'</h4>';
				}?>
			</div>
			<div class="detail"><marquee behavior="alternate">After Registration, for online play Contact us on <?=$setting->mobile?>
				</marquee></div>
		</div>
	</div>
		<div class="scroll">
			<form action="#" id="form1" method="post"><input name="selrs" type="text" value="" style="display: none">
				<input type="hidden" name="s" value="<?=$id?>" />
				<!--					<input name="selrs" type="text" value="" style="display: none">-->
				<div class="container-fluid">
				<div class="row text-white font-weight-bold">
					<?php
					foreach ($game as $games) {
						$time = date('H:i:s');
						$day = date('D');
						switch ($day) {
							case 'Sun': if($games->sunday) {
								if($games->sunday_start_time > $time && $games->status) {

									echo '<div class=" bg-success  text-center game-bid " style="width: 73px; margin: 1px"><label><input type="radio" hidden name="game_name" value="'.$games->id.'" data-bit_type="open"><input type="radio"  name="game_bit_type" value="open"><span class="" style="font-size: 13px">' . $games->title . ' <br> Open <br>'.date('h:i A' , strtotime($games->sunday_start_time)).'</span></label></div>';

								}
								else{

									echo '<div class="text-center" style="background-color: grey; width: 73px;  margin: 1px"><span class="" style="font-size: 13px">' . $games->title . ' <br> Open <br>'.date('h:i A' , strtotime($games->sunday_start_time)).'</span></div>';
								}
							}
							else{

								echo '<div class="text-center" style="background-color: grey; width: 73px;  margin: 1px"><span class="" style="font-size: 13px">' . $games->title . '<br> Open <br>'.date('h:i A' , strtotime($games->sunday_start_time)).'</span></div>';

							}
								break;
							case 'Mon': if($games->monday) {
								if($games->monday_start_time > $time && $games->status) {

									echo '<div class=" bg-success  text-center game-bid " style="width: 73px; margin: 1px"><label><input type="radio" hidden name="game_name" value="'.$games->id.'" data-bit_type="open"><span class="" style="font-size: 13px">' . $games->title . ' <br> Open <br>'.date('h:i A' , strtotime($games->monday_start_time)).'</span></label></div>';

								}
								else{

									echo '<div class="text-center" style="background-color: grey; width: 73px;  margin: 1px"><span class="" style="font-size: 13px">' . $games->title . ' <br> Open <br>'.date('h:i A' , strtotime($games->monday_start_time)).'</span></div>';
								}
							}
							else{

								echo '<div class="text-center" style="background-color: grey; width: 73px;  margin: 1px"><span class="" style="font-size: 13px">' . $games->title . '<br> Open <br>'.date('h:i A' , strtotime($games->monday_start_time)).'</span></div>';

							}
								break;

							case 'Tue': if($games->tuesday) {
								if($games->tuesday_start_time > $time && $games->status) {

									echo '<div class=" bg-success  text-center game-bid " style="width: 73px; margin: 1px"><label><input type="radio" hidden name="game_name" value="'.$games->id.'" data-bit_type="open"><span class="" style="font-size: 13px">' . $games->title . ' <br> Open <br>'.date ('h:i A' , strtotime($games->tuesday_start_time)).'</span></label></div>';

								}
								else{

									echo '<div class="text-center" style="background-color: grey; width: 73px;  margin: 1px"><span class="" style="font-size: 13px">' . $games->title . ' <br> Open <br>'.date('h:i A' , strtotime($games->tuesday_start_time)).'</span></div>';
								}
							}
							else{

								echo '<div class="text-center" style="background-color: grey; width: 73px;  margin: 1px"><span class="" style="font-size: 13px">' . $games->title . '<br> Open <br>'.date('h:i A' , strtotime($games->tuesday_start_time)).'</span></div>';

							}
								break;

							case 'Wed': if($games->wednesday) {
								if($games->wednesday_start_time > $time && $games->status) {

									echo '<div class=" bg-success  text-center game-bid " style="width: 73px; margin: 1px"><label><input type="radio" hidden name="game_name" value="'.$games->id.'" data-bit_type="open"><span class="" style="font-size: 13px">' . $games->title . ' <br> Open <br>'.date('h:i A' , strtotime($games->wednesday_start_time)).'</span></label></div>';

								}
								else{

									echo '<div class="text-center" style="background-color: grey; width: 73px;  margin: 1px"><span class="" style="font-size: 13px">' . $games->title . ' <br> Open <br>'.date('h:i A' , strtotime($games->wednesday_start_time)).'</span></div>';
								}
							}
							else{

								echo '<div class="text-center" style="background-color: grey; width: 73px;  margin: 1px"><span class="" style="font-size: 13px">' . $games->title . '<br> Open <br>'.date('h:i A' , strtotime($games->wednesday_start_time)).'</span></div>';

							}
								break;

							case 'Thu':if($games->thursday) {
								if($games->thursday_start_time > $time && $games->status) {

									echo '<div class=" bg-success  text-center game-bid " style="width: 73px; margin: 1px"><label><input type="radio" hidden  name="game_name" value="'.$games->id.'" data-bit_type="open" data-bit_type="open"><span class="" style="font-size: 13px">' . $games->title . ' <br> Open <br>'.date('h:i A' , strtotime($games->thursday_start_time)).'</span></label></div>';

								}
								else{

									echo '<div class="text-center" style="background-color: grey; width: 73px;  margin: 1px"><span class="" style="font-size: 13px">' . $games->title . ' <br> Open <br>'.date('h:i A' , strtotime($games->thursday_start_time)).'</span></div>';
								}
							}
							else{

								echo '<div class="text-center" style="background-color: grey; width: 73px;  margin: 1px"><span class="" style="font-size: 13px">' . $games->title . '<br> Open <br>'.date('h:i A' , strtotime($games->thursday_start_time)).'</span></div>';

							}
								break;

							case 'Fri' : if($games->friday) {
								if($games->friday_start_time > $time && $games->status) {

									echo '<div class=" bg-success  text-center game-bid " style="width: 73px; margin: 1px"><label><input type="radio" hidden name="game_name" value="'.$games->id.'" data-bit_type="open"><span class="" style="font-size: 13px">' . $games->title . ' <br> Open <br>'.date('h:i A' , strtotime($games->friday_start_time)).'</span></label></div>';

								}
								else{

									echo '<div class="text-center" style="background-color: grey; width: 73px;  margin: 1px"><span class="" style="font-size: 13px">' . $games->title . ' <br> Open <br>'.date('h:i A' , strtotime($games->friday_start_time)).'</span></div>';
								}
							}
							else{

								echo '<div class="text-center" style="background-color: grey; width: 73px;  margin: 1px"><span class="" style="font-size: 13px">' . $games->title . '<br> Open <br>'.date('h:i A' , strtotime($games->friday_start_time)).'</span></div>';

							}
								break;

							case 'Sat':if($games->saturday) {
								if($games->saturday_start_time > $time && $games->status) {

									echo '<div class=" bg-success  text-center game-bid " style="width: 73px; margin: 1px"><label><input type="radio" hidden name="game_name" value="'.$games->id.'" data-bit_type="open"><span class="" style="font-size: 13px">' . $games->title . ' <br> Open <br>'.date('h:i A' , strtotime($games->saturday_start_time)).'</span></label></div>';

								}
								else{

									echo '<div class="text-center" style="background-color: grey; width: 73px;  margin: 1px"><span class="" style="font-size: 13px">' . $games->title . ' <br> Open <br>'.date('h:i A' , strtotime($games->saturday_start_time)).'</span></div>';
								}
							}
							else{

								echo '<div class="text-center" style="background-color: grey; width: 73px;  margin: 1px"><span class="" style="font-size: 13px">' . $games->title . '<br> Open <br>'.date('h:i A' , strtotime($games->saturday_start_time)).'</span></div>';

							}
								break;
						}
					}
					?>
				</div>
				<div class="row text-white font-weight-bold">
					<?php

					foreach ($game as $games) {

						$time = date('H:i:s');
						$day = date('D');
						switch ($day) {
							case 'Sun': if($games->sunday && false) {
								if($games->sunday_close_time > $time && $games->status ) {

									echo '<div class=" bg-success  text-center game-bid " style="width: 73px; margin: 1px"><label><input type="radio" hidden name="game_name" value="'.$games->id.'" data-bit_type="open"><span class="" style="font-size: 13px">' . $games->title . ' <br> Close <br>'.date('h:i A' , strtotime($games->sunday_close_time)).'</span></label></div>';

								}
								else{

									echo '<div class="text-center" style="background-color: grey; width: 73px;  margin: 1px"><span class="" style="font-size: 13px">' . $games->title . ' <br> Close <br>'.date('h:i A' , strtotime($games->sunday_close_time)).'</span></div>';
								}
							}
							else{

								echo '<div class="text-center" style="background-color: grey; width: 73px;  margin: 1px"><span class="" style="font-size: 13px">' . $games->title . '<br> Close <br>'.date('h:i A' , strtotime($games->sunday_close_time)).'</span></div>';

							}
								break;
							case 'Mon': if($games->monday && false) {
								if($games->monday_close_time > $time && $games->status) {

									echo '<div class=" bg-success  text-center game-bid " style="width: 73px; margin: 1px"><label><input type="radio" hidden name="game_name" value="'.$games->id.'" data-bit_type="open"><span class="" style="font-size: 13px">' . $games->title . ' <br> Close <br>'.date('h:i A' , strtotime($games->monday_close_time)).'</span></label></div>';

								}
								else{

									echo '<div class="text-center" style="background-color: grey; width: 73px;  margin: 1px"><span class="" style="font-size: 13px">' . $games->title . ' <br> Close <br>'.date('h:i A' , strtotime($games->monday_close_time)).'</span></div>';
								}
							}
							else{

								echo '<div class="text-center" style="background-color: grey; width: 73px;  margin: 1px"><span class="" style="font-size: 13px">' . $games->title . '<br> Close <br>'.date('h:i A' , strtotime($games->monday_close_time)).'</span></div>';

							}
								break;

							case 'Tue': if($games->tuesday && false) {
								if($games->tuesday_close_time > $time && $games->status) {

									echo '<div class=" bg-success  text-center game-bid " style="width: 73px; margin: 1px"><label><input type="radio" hidden name="game_name" value="'.$games->id.'" data-bit_type="open"><span class="" style="font-size: 13px">' . $games->title . ' <br> Close <br>'.date('h:i A' , strtotime($games->tuesday_close_time)).'</span></label></div>';

								}
								else{

									echo '<div class="text-center" style="background-color: grey; width: 73px;  margin: 1px"><span class="" style="font-size: 13px">' . $games->title . ' <br> Close <br>'.date('h:i A' , strtotime($games->tuesday_close_time)).'</span></div>';
								}
							}
							else{

								echo '<div class="text-center" style="background-color: grey; width: 73px;  margin: 1px"><span class="" style="font-size: 13px">' . $games->title . '<br> Close <br>'.date('h:i A' , strtotime($games->tuesday_close_time)).'</span></div>';

							}
								break;

							case 'Wed': if($games->wednesday && false) {
								if($games->wednesday_close_time > $time && $games->status) {

									echo '<div class=" bg-success  text-center game-bid " style="width: 73px; margin: 1px"><label><input type="radio"  name="game_name" value="'.$games->id.'" data-bit_type="open">' . $games->title . ' <br> Close <br>'.date('h:i A' , strtotime($games->wednesday_close_time)).'</span></label></div>';

								}
								else{

									echo '<div class="text-center" style="background-color: grey; width: 73px;  margin: 1px"><span class="" style="font-size: 13px">' . $games->title . ' <br> Close <br>'.date('h:i A' , strtotime($games->wednesday_close_time)).'</span></div>';
								}
							}
							else{

								echo '<div class="text-center" style="background-color: grey; width: 73px;  margin: 1px"><span class="" style="font-size: 13px">' . $games->title . '<br> Close <br>'.date('h:i A' , strtotime($games->wednesday_close_time)).'</span></div>';

							}
								break;

							case 'Thu':if($games->thursday && false) {
								if($games->thursday_close_time > $time && $games->status && $id != '2') {

									echo '<div class=" bg-success  text-center game-bid " style="width: 73px; margin: 1px"><label><input type="radio" hidden  name="game_name" value="'.$games->id.'" data-bit_type="open" data-bit_type="close"><span class="" style="font-size: 13px">' . $games->title . ' <br> Close <br>'.date('h:i A' , strtotime($games->thursday_close_time)).'</span></label></div>';

								}
								else{

									echo '<div class="text-center" style="background-color: grey; width: 73px;  margin: 1px"><span class="" style="font-size: 13px">' . $games->title . ' <br> Close <br>'.date('h:i A' , strtotime($games->thursday_close_time)).'</span></div>';
								}
							}
							else{

								echo '<div class="text-center" style="background-color: grey; width: 73px;  margin: 1px"><span class="" style="font-size: 13px">' . $games->title . '<br> Close <br>'.date('h:i A' , strtotime($games->thursday_close_time)).'</span></div>';

							}
								break;

							case 'Fri' : if($games->friday && false) {
								if($games->friday_close_time > $time && $games->status) {

									echo '<div class=" bg-success  text-center game-bid " style="width: 73px; margin: 1px"><label><input type="radio" hidden name="game_name" data-id="'.$games->id.'" value="'.$games->id.'" data-bit_type="open"><span class="" style="font-size: 13px">' . $games->title . ' <br> Close <br>'.date('h:i A' , strtotime($games->friday_close_time)).'</span></label></div>';

								}
								else{

									echo '<div class="text-center" style="background-color: grey; width: 73px;  margin: 1px"><span class="" style="font-size: 13px">' . $games->title . ' <br> Close <br>'.date('h:i A' , strtotime($games->friday_close_time)).'</span></div>';
								}
							}
							else{

								echo '<div class="text-center" style="background-color: grey; width: 73px;  margin: 1px"><span class="" style="font-size: 13px">' . $games->title . '<br> Close <br>'.date('h:i A' , strtotime($games->friday_close_time)).'</span></div>';

							}
								break;

							case 'Sat': if($games->saturday && false) {
								if($games->saturday_close_time > $time && $games->status) {

									echo '<div class=" bg-success  text-center game-bid " style="width: 73px; margin: 1px"><label><input type="radio" hidden name="game_name" value="'.$games->id.'" data-bit_type="open"><span class="" style="font-size: 13px">' . $games->title . ' <br> Close <br>'.date('h:i A' , strtotime($games->saturday_close_time)).'</span></label></div>';

								}
								else{

									echo '<div class="text-center" style="background-color: grey; width: 73px;  margin: 1px"><span class="" style="font-size: 13px">' . $games->title . ' <br> Close <br>'.date('h:i A' , strtotime($games->saturday_close_time)).'</span></div>';
								}
							}
							else{

								echo '<div class="text-center" style="background-color: grey; width: 73px;  margin: 1px"><span class="" style="font-size: 13px">' . $games->title . '<br> Close <br>'.date('h:i A' , strtotime($games->saturday_close_time)).'</span></div>';

							}
								break;
						}
					}
					?>
				</div>
<!--			</div>-->

				<div class="row">
<!--				<table width="100%">-->
<!--					<tr>-->
<!--						<td width="50%">-->
					<div class="col-sm-12">
						<h2>Game: <?php echo $gameDetails->gt_min_price.':'.$gameDetails->gt_rate; ?></h2>
					</div>
					<div class="col-sm-6">

							<input type="hidden" name="game" value="HS">
							<table  cellspacing='2' cellpadding='6' border='0'><tr><td>S.No.</td><td>Close Ank</td><td>Open Patti</td><td>Points</td><tr><td>1</td><td>
										<select name="num1[]">
											<option>1</option>
											<option>2</option>
											<option>3</option>
											<option>4</option>
											<option>5</option>
											<option>6</option>
											<option>7</option>
											<option>8</option>
											<option>9</option>
											<option>0</option>
										</select>
									</td>
									<td>
										<select name="num2[]"><option>100</option>
											<option>110</option>
											<option>111</option>
											<option>112</option>
											<option>113</option>
											<option>114</option>
											<option>115</option>
											<option>116</option>
											<option>117</option>
											<option>118</option>
											<option>119</option>
											<option>120</option>
											<option>122</option>
											<option>123</option>
											<option>124</option>
											<option>125</option>
											<option>126</option>
											<option>127</option>
											<option>128</option>
											<option>129</option>
											<option>130</option>
											<option>133</option>
											<option>134</option>
											<option>135</option>
											<option>136</option>
											<option>137</option>
											<option>138</option>
											<option>139</option>
											<option>140</option>
											<option>144</option>
											<option>145</option>
											<option>146</option>
											<option>147</option>
											<option>148</option>
											<option>149</option>
											<option>150</option>
											<option>155</option>
											<option>156</option>
											<option>157</option>
											<option>158</option>
											<option>159</option>
											<option>160</option>
											<option>166</option>
											<option>167</option>
											<option>168</option>
											<option>169</option>
											<option>170</option>
											<option>177</option>
											<option>178</option>
											<option>179</option>
											<option>180</option>
											<option>188</option>
											<option>189</option>
											<option>190</option>
											<option>199</option>
											<option>200</option>
											<option>220</option>
											<option>222</option>
											<option>223</option>
											<option>224</option>
											<option>225</option>
											<option>226</option>
											<option>227</option>
											<option>228</option>
											<option>229</option>
											<option>230</option>
											<option>233</option>
											<option>234</option>
											<option>235</option>
											<option>236</option>
											<option>237</option>
											<option>238</option>
											<option>239</option>
											<option>240</option>
											<option>244</option>
											<option>245</option>
											<option>246</option>
											<option>247</option>
											<option>248</option>
											<option>249</option>
											<option>250</option>
											<option>255</option>
											<option>256</option>
											<option>257</option>
											<option>258</option>
											<option>259</option>
											<option>260</option>
											<option>266</option>
											<option>267</option>
											<option>268</option>
											<option>269</option>
											<option>270</option>
											<option>277</option>
											<option>278</option>
											<option>279</option>
											<option>280</option>
											<option>288</option>
											<option>289</option>
											<option>290</option>
											<option>299</option>
											<option>300</option>
											<option>330</option>
											<option>333</option>
											<option>334</option>
											<option>335</option>
											<option>336</option>
											<option>337</option>
											<option>338</option>
											<option>339</option>
											<option>340</option>
											<option>344</option>
											<option>345</option>
											<option>346</option>
											<option>347</option>
											<option>348</option>
											<option>349</option>
											<option>350</option>
											<option>355</option>
											<option>356</option>
											<option>357</option>
											<option>358</option>
											<option>359</option>
											<option>360</option>
											<option>366</option>
											<option>367</option>
											<option>368</option>
											<option>369</option>
											<option>370</option>
											<option>377</option>
											<option>378</option>
											<option>379</option>
											<option>380</option>
											<option>388</option>
											<option>389</option>
											<option>390</option>
											<option>399</option>
											<option>400</option>
											<option>440</option>
											<option>444</option>
											<option>445</option>
											<option>446</option>
											<option>447</option>
											<option>448</option>
											<option>449</option>
											<option>450</option>
											<option>455</option>
											<option>456</option>
											<option>457</option>
											<option>458</option>
											<option>459</option>
											<option>460</option>
											<option>466</option>
											<option>467</option>
											<option>468</option>
											<option>469</option>
											<option>470</option>
											<option>477</option>
											<option>478</option>
											<option>479</option>
											<option>480</option>
											<option>488</option>
											<option>489</option>
											<option>490</option>
											<option>499</option>
											<option>500</option>
											<option>550</option>
											<option>555</option>
											<option>556</option>
											<option>557</option>
											<option>558</option>
											<option>559</option>
											<option>560</option>
											<option>566</option>
											<option>567</option>
											<option>568</option>
											<option>569</option>
											<option>570</option>
											<option>577</option>
											<option>578</option>
											<option>579</option>
											<option>580</option>
											<option>588</option>
											<option>589</option>
											<option>590</option>
											<option>599</option>
											<option>600</option>
											<option>660</option>
											<option>666</option>
											<option>667</option>
											<option>668</option>
											<option>669</option>
											<option>670</option>
											<option>677</option>
											<option>678</option>
											<option>679</option>
											<option>680</option>
											<option>688</option>
											<option>689</option>
											<option>690</option>
											<option>699</option>
											<option>700</option>
											<option>770</option>
											<option>777</option>
											<option>778</option>
											<option>779</option>
											<option>780</option>
											<option>788</option>
											<option>789</option>
											<option>790</option>
											<option>799</option>
											<option>800</option>
											<option>880</option>
											<option>888</option>
											<option>889</option>
											<option>890</option>
											<option>899</option>
											<option>900</option>
											<option>990</option>
											<option>999</option>
											<option>000</option>
										</select></td><td><input name="pnt[]" class="bid_number" id="l_0" onkeypress="return isNumberKey(event)"  type="number" min="10"/></td></tr><tr><td>2</td><td><select name="num1[]"><option>1</option><option>2</option><option>3</option><option>4</option><option>5</option><option>6</option><option>7</option><option>8</option><option>9</option><option>0</option></select></td><td><select name="num2[]"><option>100</option>
											<option>110</option>
											<option>111</option>
											<option>112</option>
											<option>113</option>
											<option>114</option>
											<option>115</option>
											<option>116</option>
											<option>117</option>
											<option>118</option>
											<option>119</option>
											<option>120</option>
											<option>122</option>
											<option>123</option>
											<option>124</option>
											<option>125</option>
											<option>126</option>
											<option>127</option>
											<option>128</option>
											<option>129</option>
											<option>130</option>
											<option>133</option>
											<option>134</option>
											<option>135</option>
											<option>136</option>
											<option>137</option>
											<option>138</option>
											<option>139</option>
											<option>140</option>
											<option>144</option>
											<option>145</option>
											<option>146</option>
											<option>147</option>
											<option>148</option>
											<option>149</option>
											<option>150</option>
											<option>155</option>
											<option>156</option>
											<option>157</option>
											<option>158</option>
											<option>159</option>
											<option>160</option>
											<option>166</option>
											<option>167</option>
											<option>168</option>
											<option>169</option>
											<option>170</option>
											<option>177</option>
											<option>178</option>
											<option>179</option>
											<option>180</option>
											<option>188</option>
											<option>189</option>
											<option>190</option>
											<option>199</option>
											<option>200</option>
											<option>220</option>
											<option>222</option>
											<option>223</option>
											<option>224</option>
											<option>225</option>
											<option>226</option>
											<option>227</option>
											<option>228</option>
											<option>229</option>
											<option>230</option>
											<option>233</option>
											<option>234</option>
											<option>235</option>
											<option>236</option>
											<option>237</option>
											<option>238</option>
											<option>239</option>
											<option>240</option>
											<option>244</option>
											<option>245</option>
											<option>246</option>
											<option>247</option>
											<option>248</option>
											<option>249</option>
											<option>250</option>
											<option>255</option>
											<option>256</option>
											<option>257</option>
											<option>258</option>
											<option>259</option>
											<option>260</option>
											<option>266</option>
											<option>267</option>
											<option>268</option>
											<option>269</option>
											<option>270</option>
											<option>277</option>
											<option>278</option>
											<option>279</option>
											<option>280</option>
											<option>288</option>
											<option>289</option>
											<option>290</option>
											<option>299</option>
											<option>300</option>
											<option>330</option>
											<option>333</option>
											<option>334</option>
											<option>335</option>
											<option>336</option>
											<option>337</option>
											<option>338</option>
											<option>339</option>
											<option>340</option>
											<option>344</option>
											<option>345</option>
											<option>346</option>
											<option>347</option>
											<option>348</option>
											<option>349</option>
											<option>350</option>
											<option>355</option>
											<option>356</option>
											<option>357</option>
											<option>358</option>
											<option>359</option>
											<option>360</option>
											<option>366</option>
											<option>367</option>
											<option>368</option>
											<option>369</option>
											<option>370</option>
											<option>377</option>
											<option>378</option>
											<option>379</option>
											<option>380</option>
											<option>388</option>
											<option>389</option>
											<option>390</option>
											<option>399</option>
											<option>400</option>
											<option>440</option>
											<option>444</option>
											<option>445</option>
											<option>446</option>
											<option>447</option>
											<option>448</option>
											<option>449</option>
											<option>450</option>
											<option>455</option>
											<option>456</option>
											<option>457</option>
											<option>458</option>
											<option>459</option>
											<option>460</option>
											<option>466</option>
											<option>467</option>
											<option>468</option>
											<option>469</option>
											<option>470</option>
											<option>477</option>
											<option>478</option>
											<option>479</option>
											<option>480</option>
											<option>488</option>
											<option>489</option>
											<option>490</option>
											<option>499</option>
											<option>500</option>
											<option>550</option>
											<option>555</option>
											<option>556</option>
											<option>557</option>
											<option>558</option>
											<option>559</option>
											<option>560</option>
											<option>566</option>
											<option>567</option>
											<option>568</option>
											<option>569</option>
											<option>570</option>
											<option>577</option>
											<option>578</option>
											<option>579</option>
											<option>580</option>
											<option>588</option>
											<option>589</option>
											<option>590</option>
											<option>599</option>
											<option>600</option>
											<option>660</option>
											<option>666</option>
											<option>667</option>
											<option>668</option>
											<option>669</option>
											<option>670</option>
											<option>677</option>
											<option>678</option>
											<option>679</option>
											<option>680</option>
											<option>688</option>
											<option>689</option>
											<option>690</option>
											<option>699</option>
											<option>700</option>
											<option>770</option>
											<option>777</option>
											<option>778</option>
											<option>779</option>
											<option>780</option>
											<option>788</option>
											<option>789</option>
											<option>790</option>
											<option>799</option>
											<option>800</option>
											<option>880</option>
											<option>888</option>
											<option>889</option>
											<option>890</option>
											<option>899</option>
											<option>900</option>
											<option>990</option>
											<option>999</option>
											<option>000</option>
										</select></td><td>
										<input name="pnt[]" class="bid_number" id="l_1" onkeypress="return isNumberKey(event)"  type="number" min="10" />
									</td></tr><tr><td>3</td><td><select name="num1[]"><option>1</option><option>2</option><option>3</option><option>4</option><option>5</option><option>6</option><option>7</option><option>8</option><option>9</option><option>0</option></select></td><td><select name="num2[]"><option>100</option>
											<option>110</option>
											<option>111</option>
											<option>112</option>
											<option>113</option>
											<option>114</option>
											<option>115</option>
											<option>116</option>
											<option>117</option>
											<option>118</option>
											<option>119</option>
											<option>120</option>
											<option>122</option>
											<option>123</option>
											<option>124</option>
											<option>125</option>
											<option>126</option>
											<option>127</option>
											<option>128</option>
											<option>129</option>
											<option>130</option>
											<option>133</option>
											<option>134</option>
											<option>135</option>
											<option>136</option>
											<option>137</option>
											<option>138</option>
											<option>139</option>
											<option>140</option>
											<option>144</option>
											<option>145</option>
											<option>146</option>
											<option>147</option>
											<option>148</option>
											<option>149</option>
											<option>150</option>
											<option>155</option>
											<option>156</option>
											<option>157</option>
											<option>158</option>
											<option>159</option>
											<option>160</option>
											<option>166</option>
											<option>167</option>
											<option>168</option>
											<option>169</option>
											<option>170</option>
											<option>177</option>
											<option>178</option>
											<option>179</option>
											<option>180</option>
											<option>188</option>
											<option>189</option>
											<option>190</option>
											<option>199</option>
											<option>200</option>
											<option>220</option>
											<option>222</option>
											<option>223</option>
											<option>224</option>
											<option>225</option>
											<option>226</option>
											<option>227</option>
											<option>228</option>
											<option>229</option>
											<option>230</option>
											<option>233</option>
											<option>234</option>
											<option>235</option>
											<option>236</option>
											<option>237</option>
											<option>238</option>
											<option>239</option>
											<option>240</option>
											<option>244</option>
											<option>245</option>
											<option>246</option>
											<option>247</option>
											<option>248</option>
											<option>249</option>
											<option>250</option>
											<option>255</option>
											<option>256</option>
											<option>257</option>
											<option>258</option>
											<option>259</option>
											<option>260</option>
											<option>266</option>
											<option>267</option>
											<option>268</option>
											<option>269</option>
											<option>270</option>
											<option>277</option>
											<option>278</option>
											<option>279</option>
											<option>280</option>
											<option>288</option>
											<option>289</option>
											<option>290</option>
											<option>299</option>
											<option>300</option>
											<option>330</option>
											<option>333</option>
											<option>334</option>
											<option>335</option>
											<option>336</option>
											<option>337</option>
											<option>338</option>
											<option>339</option>
											<option>340</option>
											<option>344</option>
											<option>345</option>
											<option>346</option>
											<option>347</option>
											<option>348</option>
											<option>349</option>
											<option>350</option>
											<option>355</option>
											<option>356</option>
											<option>357</option>
											<option>358</option>
											<option>359</option>
											<option>360</option>
											<option>366</option>
											<option>367</option>
											<option>368</option>
											<option>369</option>
											<option>370</option>
											<option>377</option>
											<option>378</option>
											<option>379</option>
											<option>380</option>
											<option>388</option>
											<option>389</option>
											<option>390</option>
											<option>399</option>
											<option>400</option>
											<option>440</option>
											<option>444</option>
											<option>445</option>
											<option>446</option>
											<option>447</option>
											<option>448</option>
											<option>449</option>
											<option>450</option>
											<option>455</option>
											<option>456</option>
											<option>457</option>
											<option>458</option>
											<option>459</option>
											<option>460</option>
											<option>466</option>
											<option>467</option>
											<option>468</option>
											<option>469</option>
											<option>470</option>
											<option>477</option>
											<option>478</option>
											<option>479</option>
											<option>480</option>
											<option>488</option>
											<option>489</option>
											<option>490</option>
											<option>499</option>
											<option>500</option>
											<option>550</option>
											<option>555</option>
											<option>556</option>
											<option>557</option>
											<option>558</option>
											<option>559</option>
											<option>560</option>
											<option>566</option>
											<option>567</option>
											<option>568</option>
											<option>569</option>
											<option>570</option>
											<option>577</option>
											<option>578</option>
											<option>579</option>
											<option>580</option>
											<option>588</option>
											<option>589</option>
											<option>590</option>
											<option>599</option>
											<option>600</option>
											<option>660</option>
											<option>666</option>
											<option>667</option>
											<option>668</option>
											<option>669</option>
											<option>670</option>
											<option>677</option>
											<option>678</option>
											<option>679</option>
											<option>680</option>
											<option>688</option>
											<option>689</option>
											<option>690</option>
											<option>699</option>
											<option>700</option>
											<option>770</option>
											<option>777</option>
											<option>778</option>
											<option>779</option>
											<option>780</option>
											<option>788</option>
											<option>789</option>
											<option>790</option>
											<option>799</option>
											<option>800</option>
											<option>880</option>
											<option>888</option>
											<option>889</option>
											<option>890</option>
											<option>899</option>
											<option>900</option>
											<option>990</option>
											<option>999</option>
											<option>000</option>
										</select></td><td><input name="pnt[]" class="bid_number" id="l_2" onkeypress="return isNumberKey(event)"  type="number" min="10" /></td></tr><tr><td>4</td><td><select name="num1[]"><option>1</option><option>2</option><option>3</option><option>4</option><option>5</option><option>6</option><option>7</option><option>8</option><option>9</option><option>0</option></select></td><td><select name="num2[]"><option>100</option>
											<option>110</option>
											<option>111</option>
											<option>112</option>
											<option>113</option>
											<option>114</option>
											<option>115</option>
											<option>116</option>
											<option>117</option>
											<option>118</option>
											<option>119</option>
											<option>120</option>
											<option>122</option>
											<option>123</option>
											<option>124</option>
											<option>125</option>
											<option>126</option>
											<option>127</option>
											<option>128</option>
											<option>129</option>
											<option>130</option>
											<option>133</option>
											<option>134</option>
											<option>135</option>
											<option>136</option>
											<option>137</option>
											<option>138</option>
											<option>139</option>
											<option>140</option>
											<option>144</option>
											<option>145</option>
											<option>146</option>
											<option>147</option>
											<option>148</option>
											<option>149</option>
											<option>150</option>
											<option>155</option>
											<option>156</option>
											<option>157</option>
											<option>158</option>
											<option>159</option>
											<option>160</option>
											<option>166</option>
											<option>167</option>
											<option>168</option>
											<option>169</option>
											<option>170</option>
											<option>177</option>
											<option>178</option>
											<option>179</option>
											<option>180</option>
											<option>188</option>
											<option>189</option>
											<option>190</option>
											<option>199</option>
											<option>200</option>
											<option>220</option>
											<option>222</option>
											<option>223</option>
											<option>224</option>
											<option>225</option>
											<option>226</option>
											<option>227</option>
											<option>228</option>
											<option>229</option>
											<option>230</option>
											<option>233</option>
											<option>234</option>
											<option>235</option>
											<option>236</option>
											<option>237</option>
											<option>238</option>
											<option>239</option>
											<option>240</option>
											<option>244</option>
											<option>245</option>
											<option>246</option>
											<option>247</option>
											<option>248</option>
											<option>249</option>
											<option>250</option>
											<option>255</option>
											<option>256</option>
											<option>257</option>
											<option>258</option>
											<option>259</option>
											<option>260</option>
											<option>266</option>
											<option>267</option>
											<option>268</option>
											<option>269</option>
											<option>270</option>
											<option>277</option>
											<option>278</option>
											<option>279</option>
											<option>280</option>
											<option>288</option>
											<option>289</option>
											<option>290</option>
											<option>299</option>
											<option>300</option>
											<option>330</option>
											<option>333</option>
											<option>334</option>
											<option>335</option>
											<option>336</option>
											<option>337</option>
											<option>338</option>
											<option>339</option>
											<option>340</option>
											<option>344</option>
											<option>345</option>
											<option>346</option>
											<option>347</option>
											<option>348</option>
											<option>349</option>
											<option>350</option>
											<option>355</option>
											<option>356</option>
											<option>357</option>
											<option>358</option>
											<option>359</option>
											<option>360</option>
											<option>366</option>
											<option>367</option>
											<option>368</option>
											<option>369</option>
											<option>370</option>
											<option>377</option>
											<option>378</option>
											<option>379</option>
											<option>380</option>
											<option>388</option>
											<option>389</option>
											<option>390</option>
											<option>399</option>
											<option>400</option>
											<option>440</option>
											<option>444</option>
											<option>445</option>
											<option>446</option>
											<option>447</option>
											<option>448</option>
											<option>449</option>
											<option>450</option>
											<option>455</option>
											<option>456</option>
											<option>457</option>
											<option>458</option>
											<option>459</option>
											<option>460</option>
											<option>466</option>
											<option>467</option>
											<option>468</option>
											<option>469</option>
											<option>470</option>
											<option>477</option>
											<option>478</option>
											<option>479</option>
											<option>480</option>
											<option>488</option>
											<option>489</option>
											<option>490</option>
											<option>499</option>
											<option>500</option>
											<option>550</option>
											<option>555</option>
											<option>556</option>
											<option>557</option>
											<option>558</option>
											<option>559</option>
											<option>560</option>
											<option>566</option>
											<option>567</option>
											<option>568</option>
											<option>569</option>
											<option>570</option>
											<option>577</option>
											<option>578</option>
											<option>579</option>
											<option>580</option>
											<option>588</option>
											<option>589</option>
											<option>590</option>
											<option>599</option>
											<option>600</option>
											<option>660</option>
											<option>666</option>
											<option>667</option>
											<option>668</option>
											<option>669</option>
											<option>670</option>
											<option>677</option>
											<option>678</option>
											<option>679</option>
											<option>680</option>
											<option>688</option>
											<option>689</option>
											<option>690</option>
											<option>699</option>
											<option>700</option>
											<option>770</option>
											<option>777</option>
											<option>778</option>
											<option>779</option>
											<option>780</option>
											<option>788</option>
											<option>789</option>
											<option>790</option>
											<option>799</option>
											<option>800</option>
											<option>880</option>
											<option>888</option>
											<option>889</option>
											<option>890</option>
											<option>899</option>
											<option>900</option>
											<option>990</option>
											<option>999</option>
											<option>000</option>
										</select></td><td><input name="pnt[]" class="bid_number" id="l_3" onkeypress="return isNumberKey(event)"  type="number" min="10"  /></td></tr><tr><td>5</td><td><select name="num1[]"><option>1</option><option>2</option><option>3</option><option>4</option><option>5</option><option>6</option><option>7</option><option>8</option><option>9</option><option>0</option></select></td><td><select name="num2[]"><option>100</option>
											<option>110</option>
											<option>111</option>
											<option>112</option>
											<option>113</option>
											<option>114</option>
											<option>115</option>
											<option>116</option>
											<option>117</option>
											<option>118</option>
											<option>119</option>
											<option>120</option>
											<option>122</option>
											<option>123</option>
											<option>124</option>
											<option>125</option>
											<option>126</option>
											<option>127</option>
											<option>128</option>
											<option>129</option>
											<option>130</option>
											<option>133</option>
											<option>134</option>
											<option>135</option>
											<option>136</option>
											<option>137</option>
											<option>138</option>
											<option>139</option>
											<option>140</option>
											<option>144</option>
											<option>145</option>
											<option>146</option>
											<option>147</option>
											<option>148</option>
											<option>149</option>
											<option>150</option>
											<option>155</option>
											<option>156</option>
											<option>157</option>
											<option>158</option>
											<option>159</option>
											<option>160</option>
											<option>166</option>
											<option>167</option>
											<option>168</option>
											<option>169</option>
											<option>170</option>
											<option>177</option>
											<option>178</option>
											<option>179</option>
											<option>180</option>
											<option>188</option>
											<option>189</option>
											<option>190</option>
											<option>199</option>
											<option>200</option>
											<option>220</option>
											<option>222</option>
											<option>223</option>
											<option>224</option>
											<option>225</option>
											<option>226</option>
											<option>227</option>
											<option>228</option>
											<option>229</option>
											<option>230</option>
											<option>233</option>
											<option>234</option>
											<option>235</option>
											<option>236</option>
											<option>237</option>
											<option>238</option>
											<option>239</option>
											<option>240</option>
											<option>244</option>
											<option>245</option>
											<option>246</option>
											<option>247</option>
											<option>248</option>
											<option>249</option>
											<option>250</option>
											<option>255</option>
											<option>256</option>
											<option>257</option>
											<option>258</option>
											<option>259</option>
											<option>260</option>
											<option>266</option>
											<option>267</option>
											<option>268</option>
											<option>269</option>
											<option>270</option>
											<option>277</option>
											<option>278</option>
											<option>279</option>
											<option>280</option>
											<option>288</option>
											<option>289</option>
											<option>290</option>
											<option>299</option>
											<option>300</option>
											<option>330</option>
											<option>333</option>
											<option>334</option>
											<option>335</option>
											<option>336</option>
											<option>337</option>
											<option>338</option>
											<option>339</option>
											<option>340</option>
											<option>344</option>
											<option>345</option>
											<option>346</option>
											<option>347</option>
											<option>348</option>
											<option>349</option>
											<option>350</option>
											<option>355</option>
											<option>356</option>
											<option>357</option>
											<option>358</option>
											<option>359</option>
											<option>360</option>
											<option>366</option>
											<option>367</option>
											<option>368</option>
											<option>369</option>
											<option>370</option>
											<option>377</option>
											<option>378</option>
											<option>379</option>
											<option>380</option>
											<option>388</option>
											<option>389</option>
											<option>390</option>
											<option>399</option>
											<option>400</option>
											<option>440</option>
											<option>444</option>
											<option>445</option>
											<option>446</option>
											<option>447</option>
											<option>448</option>
											<option>449</option>
											<option>450</option>
											<option>455</option>
											<option>456</option>
											<option>457</option>
											<option>458</option>
											<option>459</option>
											<option>460</option>
											<option>466</option>
											<option>467</option>
											<option>468</option>
											<option>469</option>
											<option>470</option>
											<option>477</option>
											<option>478</option>
											<option>479</option>
											<option>480</option>
											<option>488</option>
											<option>489</option>
											<option>490</option>
											<option>499</option>
											<option>500</option>
											<option>550</option>
											<option>555</option>
											<option>556</option>
											<option>557</option>
											<option>558</option>
											<option>559</option>
											<option>560</option>
											<option>566</option>
											<option>567</option>
											<option>568</option>
											<option>569</option>
											<option>570</option>
											<option>577</option>
											<option>578</option>
											<option>579</option>
											<option>580</option>
											<option>588</option>
											<option>589</option>
											<option>590</option>
											<option>599</option>
											<option>600</option>
											<option>660</option>
											<option>666</option>
											<option>667</option>
											<option>668</option>
											<option>669</option>
											<option>670</option>
											<option>677</option>
											<option>678</option>
											<option>679</option>
											<option>680</option>
											<option>688</option>
											<option>689</option>
											<option>690</option>
											<option>699</option>
											<option>700</option>
											<option>770</option>
											<option>777</option>
											<option>778</option>
											<option>779</option>
											<option>780</option>
											<option>788</option>
											<option>789</option>
											<option>790</option>
											<option>799</option>
											<option>800</option>
											<option>880</option>
											<option>888</option>
											<option>889</option>
											<option>890</option>
											<option>899</option>
											<option>900</option>
											<option>990</option>
											<option>999</option>
											<option>000</option>
										</select></td><td><input name="pnt[]" class="bid_number" id="l_4"  onkeypress="return isNumberKey(event)"  type="number" min="10" /></td></tr><tr><td>6</td><td><select name="num1[]"><option>1</option><option>2</option><option>3</option><option>4</option><option>5</option><option>6</option><option>7</option><option>8</option><option>9</option><option>0</option></select></td><td><select name="num2[]"><option>100</option>
											<option>110</option>
											<option>111</option>
											<option>112</option>
											<option>113</option>
											<option>114</option>
											<option>115</option>
											<option>116</option>
											<option>117</option>
											<option>118</option>
											<option>119</option>
											<option>120</option>
											<option>122</option>
											<option>123</option>
											<option>124</option>
											<option>125</option>
											<option>126</option>
											<option>127</option>
											<option>128</option>
											<option>129</option>
											<option>130</option>
											<option>133</option>
											<option>134</option>
											<option>135</option>
											<option>136</option>
											<option>137</option>
											<option>138</option>
											<option>139</option>
											<option>140</option>
											<option>144</option>
											<option>145</option>
											<option>146</option>
											<option>147</option>
											<option>148</option>
											<option>149</option>
											<option>150</option>
											<option>155</option>
											<option>156</option>
											<option>157</option>
											<option>158</option>
											<option>159</option>
											<option>160</option>
											<option>166</option>
											<option>167</option>
											<option>168</option>
											<option>169</option>
											<option>170</option>
											<option>177</option>
											<option>178</option>
											<option>179</option>
											<option>180</option>
											<option>188</option>
											<option>189</option>
											<option>190</option>
											<option>199</option>
											<option>200</option>
											<option>220</option>
											<option>222</option>
											<option>223</option>
											<option>224</option>
											<option>225</option>
											<option>226</option>
											<option>227</option>
											<option>228</option>
											<option>229</option>
											<option>230</option>
											<option>233</option>
											<option>234</option>
											<option>235</option>
											<option>236</option>
											<option>237</option>
											<option>238</option>
											<option>239</option>
											<option>240</option>
											<option>244</option>
											<option>245</option>
											<option>246</option>
											<option>247</option>
											<option>248</option>
											<option>249</option>
											<option>250</option>
											<option>255</option>
											<option>256</option>
											<option>257</option>
											<option>258</option>
											<option>259</option>
											<option>260</option>
											<option>266</option>
											<option>267</option>
											<option>268</option>
											<option>269</option>
											<option>270</option>
											<option>277</option>
											<option>278</option>
											<option>279</option>
											<option>280</option>
											<option>288</option>
											<option>289</option>
											<option>290</option>
											<option>299</option>
											<option>300</option>
											<option>330</option>
											<option>333</option>
											<option>334</option>
											<option>335</option>
											<option>336</option>
											<option>337</option>
											<option>338</option>
											<option>339</option>
											<option>340</option>
											<option>344</option>
											<option>345</option>
											<option>346</option>
											<option>347</option>
											<option>348</option>
											<option>349</option>
											<option>350</option>
											<option>355</option>
											<option>356</option>
											<option>357</option>
											<option>358</option>
											<option>359</option>
											<option>360</option>
											<option>366</option>
											<option>367</option>
											<option>368</option>
											<option>369</option>
											<option>370</option>
											<option>377</option>
											<option>378</option>
											<option>379</option>
											<option>380</option>
											<option>388</option>
											<option>389</option>
											<option>390</option>
											<option>399</option>
											<option>400</option>
											<option>440</option>
											<option>444</option>
											<option>445</option>
											<option>446</option>
											<option>447</option>
											<option>448</option>
											<option>449</option>
											<option>450</option>
											<option>455</option>
											<option>456</option>
											<option>457</option>
											<option>458</option>
											<option>459</option>
											<option>460</option>
											<option>466</option>
											<option>467</option>
											<option>468</option>
											<option>469</option>
											<option>470</option>
											<option>477</option>
											<option>478</option>
											<option>479</option>
											<option>480</option>
											<option>488</option>
											<option>489</option>
											<option>490</option>
											<option>499</option>
											<option>500</option>
											<option>550</option>
											<option>555</option>
											<option>556</option>
											<option>557</option>
											<option>558</option>
											<option>559</option>
											<option>560</option>
											<option>566</option>
											<option>567</option>
											<option>568</option>
											<option>569</option>
											<option>570</option>
											<option>577</option>
											<option>578</option>
											<option>579</option>
											<option>580</option>
											<option>588</option>
											<option>589</option>
											<option>590</option>
											<option>599</option>
											<option>600</option>
											<option>660</option>
											<option>666</option>
											<option>667</option>
											<option>668</option>
											<option>669</option>
											<option>670</option>
											<option>677</option>
											<option>678</option>
											<option>679</option>
											<option>680</option>
											<option>688</option>
											<option>689</option>
											<option>690</option>
											<option>699</option>
											<option>700</option>
											<option>770</option>
											<option>777</option>
											<option>778</option>
											<option>779</option>
											<option>780</option>
											<option>788</option>
											<option>789</option>
											<option>790</option>
											<option>799</option>
											<option>800</option>
											<option>880</option>
											<option>888</option>
											<option>889</option>
											<option>890</option>
											<option>899</option>
											<option>900</option>
											<option>990</option>
											<option>999</option>
											<option>000</option>
										</select></td><td><input name="pnt[]" class="bid_number" id="l_5" onkeypress="return isNumberKey(event)"  type="number" min="10" /></td></tr><tr><td>7</td><td><select name="num1[]"><option>1</option><option>2</option><option>3</option><option>4</option><option>5</option><option>6</option><option>7</option><option>8</option><option>9</option><option>0</option></select></td><td><select name="num2[]"><option>100</option>
											<option>110</option>
											<option>111</option>
											<option>112</option>
											<option>113</option>
											<option>114</option>
											<option>115</option>
											<option>116</option>
											<option>117</option>
											<option>118</option>
											<option>119</option>
											<option>120</option>
											<option>122</option>
											<option>123</option>
											<option>124</option>
											<option>125</option>
											<option>126</option>
											<option>127</option>
											<option>128</option>
											<option>129</option>
											<option>130</option>
											<option>133</option>
											<option>134</option>
											<option>135</option>
											<option>136</option>
											<option>137</option>
											<option>138</option>
											<option>139</option>
											<option>140</option>
											<option>144</option>
											<option>145</option>
											<option>146</option>
											<option>147</option>
											<option>148</option>
											<option>149</option>
											<option>150</option>
											<option>155</option>
											<option>156</option>
											<option>157</option>
											<option>158</option>
											<option>159</option>
											<option>160</option>
											<option>166</option>
											<option>167</option>
											<option>168</option>
											<option>169</option>
											<option>170</option>
											<option>177</option>
											<option>178</option>
											<option>179</option>
											<option>180</option>
											<option>188</option>
											<option>189</option>
											<option>190</option>
											<option>199</option>
											<option>200</option>
											<option>220</option>
											<option>222</option>
											<option>223</option>
											<option>224</option>
											<option>225</option>
											<option>226</option>
											<option>227</option>
											<option>228</option>
											<option>229</option>
											<option>230</option>
											<option>233</option>
											<option>234</option>
											<option>235</option>
											<option>236</option>
											<option>237</option>
											<option>238</option>
											<option>239</option>
											<option>240</option>
											<option>244</option>
											<option>245</option>
											<option>246</option>
											<option>247</option>
											<option>248</option>
											<option>249</option>
											<option>250</option>
											<option>255</option>
											<option>256</option>
											<option>257</option>
											<option>258</option>
											<option>259</option>
											<option>260</option>
											<option>266</option>
											<option>267</option>
											<option>268</option>
											<option>269</option>
											<option>270</option>
											<option>277</option>
											<option>278</option>
											<option>279</option>
											<option>280</option>
											<option>288</option>
											<option>289</option>
											<option>290</option>
											<option>299</option>
											<option>300</option>
											<option>330</option>
											<option>333</option>
											<option>334</option>
											<option>335</option>
											<option>336</option>
											<option>337</option>
											<option>338</option>
											<option>339</option>
											<option>340</option>
											<option>344</option>
											<option>345</option>
											<option>346</option>
											<option>347</option>
											<option>348</option>
											<option>349</option>
											<option>350</option>
											<option>355</option>
											<option>356</option>
											<option>357</option>
											<option>358</option>
											<option>359</option>
											<option>360</option>
											<option>366</option>
											<option>367</option>
											<option>368</option>
											<option>369</option>
											<option>370</option>
											<option>377</option>
											<option>378</option>
											<option>379</option>
											<option>380</option>
											<option>388</option>
											<option>389</option>
											<option>390</option>
											<option>399</option>
											<option>400</option>
											<option>440</option>
											<option>444</option>
											<option>445</option>
											<option>446</option>
											<option>447</option>
											<option>448</option>
											<option>449</option>
											<option>450</option>
											<option>455</option>
											<option>456</option>
											<option>457</option>
											<option>458</option>
											<option>459</option>
											<option>460</option>
											<option>466</option>
											<option>467</option>
											<option>468</option>
											<option>469</option>
											<option>470</option>
											<option>477</option>
											<option>478</option>
											<option>479</option>
											<option>480</option>
											<option>488</option>
											<option>489</option>
											<option>490</option>
											<option>499</option>
											<option>500</option>
											<option>550</option>
											<option>555</option>
											<option>556</option>
											<option>557</option>
											<option>558</option>
											<option>559</option>
											<option>560</option>
											<option>566</option>
											<option>567</option>
											<option>568</option>
											<option>569</option>
											<option>570</option>
											<option>577</option>
											<option>578</option>
											<option>579</option>
											<option>580</option>
											<option>588</option>
											<option>589</option>
											<option>590</option>
											<option>599</option>
											<option>600</option>
											<option>660</option>
											<option>666</option>
											<option>667</option>
											<option>668</option>
											<option>669</option>
											<option>670</option>
											<option>677</option>
											<option>678</option>
											<option>679</option>
											<option>680</option>
											<option>688</option>
											<option>689</option>
											<option>690</option>
											<option>699</option>
											<option>700</option>
											<option>770</option>
											<option>777</option>
											<option>778</option>
											<option>779</option>
											<option>780</option>
											<option>788</option>
											<option>789</option>
											<option>790</option>
											<option>799</option>
											<option>800</option>
											<option>880</option>
											<option>888</option>
											<option>889</option>
											<option>890</option>
											<option>899</option>
											<option>900</option>
											<option>990</option>
											<option>999</option>
											<option>000</option>
										</select></td><td><input name="pnt[]" class="bid_number" id="l_6" onkeypress="return isNumberKey(event)"  type="number" min="10" /></td></tr><tr><td>8</td><td><select name="num1[]"><option>1</option><option>2</option><option>3</option><option>4</option><option>5</option><option>6</option><option>7</option><option>8</option><option>9</option><option>0</option></select></td><td><select name="num2[]"><option>100</option>
											<option>110</option>
											<option>111</option>
											<option>112</option>
											<option>113</option>
											<option>114</option>
											<option>115</option>
											<option>116</option>
											<option>117</option>
											<option>118</option>
											<option>119</option>
											<option>120</option>
											<option>122</option>
											<option>123</option>
											<option>124</option>
											<option>125</option>
											<option>126</option>
											<option>127</option>
											<option>128</option>
											<option>129</option>
											<option>130</option>
											<option>133</option>
											<option>134</option>
											<option>135</option>
											<option>136</option>
											<option>137</option>
											<option>138</option>
											<option>139</option>
											<option>140</option>
											<option>144</option>
											<option>145</option>
											<option>146</option>
											<option>147</option>
											<option>148</option>
											<option>149</option>
											<option>150</option>
											<option>155</option>
											<option>156</option>
											<option>157</option>
											<option>158</option>
											<option>159</option>
											<option>160</option>
											<option>166</option>
											<option>167</option>
											<option>168</option>
											<option>169</option>
											<option>170</option>
											<option>177</option>
											<option>178</option>
											<option>179</option>
											<option>180</option>
											<option>188</option>
											<option>189</option>
											<option>190</option>
											<option>199</option>
											<option>200</option>
											<option>220</option>
											<option>222</option>
											<option>223</option>
											<option>224</option>
											<option>225</option>
											<option>226</option>
											<option>227</option>
											<option>228</option>
											<option>229</option>
											<option>230</option>
											<option>233</option>
											<option>234</option>
											<option>235</option>
											<option>236</option>
											<option>237</option>
											<option>238</option>
											<option>239</option>
											<option>240</option>
											<option>244</option>
											<option>245</option>
											<option>246</option>
											<option>247</option>
											<option>248</option>
											<option>249</option>
											<option>250</option>
											<option>255</option>
											<option>256</option>
											<option>257</option>
											<option>258</option>
											<option>259</option>
											<option>260</option>
											<option>266</option>
											<option>267</option>
											<option>268</option>
											<option>269</option>
											<option>270</option>
											<option>277</option>
											<option>278</option>
											<option>279</option>
											<option>280</option>
											<option>288</option>
											<option>289</option>
											<option>290</option>
											<option>299</option>
											<option>300</option>
											<option>330</option>
											<option>333</option>
											<option>334</option>
											<option>335</option>
											<option>336</option>
											<option>337</option>
											<option>338</option>
											<option>339</option>
											<option>340</option>
											<option>344</option>
											<option>345</option>
											<option>346</option>
											<option>347</option>
											<option>348</option>
											<option>349</option>
											<option>350</option>
											<option>355</option>
											<option>356</option>
											<option>357</option>
											<option>358</option>
											<option>359</option>
											<option>360</option>
											<option>366</option>
											<option>367</option>
											<option>368</option>
											<option>369</option>
											<option>370</option>
											<option>377</option>
											<option>378</option>
											<option>379</option>
											<option>380</option>
											<option>388</option>
											<option>389</option>
											<option>390</option>
											<option>399</option>
											<option>400</option>
											<option>440</option>
											<option>444</option>
											<option>445</option>
											<option>446</option>
											<option>447</option>
											<option>448</option>
											<option>449</option>
											<option>450</option>
											<option>455</option>
											<option>456</option>
											<option>457</option>
											<option>458</option>
											<option>459</option>
											<option>460</option>
											<option>466</option>
											<option>467</option>
											<option>468</option>
											<option>469</option>
											<option>470</option>
											<option>477</option>
											<option>478</option>
											<option>479</option>
											<option>480</option>
											<option>488</option>
											<option>489</option>
											<option>490</option>
											<option>499</option>
											<option>500</option>
											<option>550</option>
											<option>555</option>
											<option>556</option>
											<option>557</option>
											<option>558</option>
											<option>559</option>
											<option>560</option>
											<option>566</option>
											<option>567</option>
											<option>568</option>
											<option>569</option>
											<option>570</option>
											<option>577</option>
											<option>578</option>
											<option>579</option>
											<option>580</option>
											<option>588</option>
											<option>589</option>
											<option>590</option>
											<option>599</option>
											<option>600</option>
											<option>660</option>
											<option>666</option>
											<option>667</option>
											<option>668</option>
											<option>669</option>
											<option>670</option>
											<option>677</option>
											<option>678</option>
											<option>679</option>
											<option>680</option>
											<option>688</option>
											<option>689</option>
											<option>690</option>
											<option>699</option>
											<option>700</option>
											<option>770</option>
											<option>777</option>
											<option>778</option>
											<option>779</option>
											<option>780</option>
											<option>788</option>
											<option>789</option>
											<option>790</option>
											<option>799</option>
											<option>800</option>
											<option>880</option>
											<option>888</option>
											<option>889</option>
											<option>890</option>
											<option>899</option>
											<option>900</option>
											<option>990</option>
											<option>999</option>
											<option>000</option>
										</select></td><td><input name="pnt[]" class="bid_number" id="l_7" onkeypress="return isNumberKey(event)"  type="number" min="10" /></td></tr><tr><td>9</td><td><select name="num1[]"><option>1</option><option>2</option><option>3</option><option>4</option><option>5</option><option>6</option><option>7</option><option>8</option><option>9</option><option>0</option></select></td><td><select name="num2[]"><option>100</option>
											<option>110</option>
											<option>111</option>
											<option>112</option>
											<option>113</option>
											<option>114</option>
											<option>115</option>
											<option>116</option>
											<option>117</option>
											<option>118</option>
											<option>119</option>
											<option>120</option>
											<option>122</option>
											<option>123</option>
											<option>124</option>
											<option>125</option>
											<option>126</option>
											<option>127</option>
											<option>128</option>
											<option>129</option>
											<option>130</option>
											<option>133</option>
											<option>134</option>
											<option>135</option>
											<option>136</option>
											<option>137</option>
											<option>138</option>
											<option>139</option>
											<option>140</option>
											<option>144</option>
											<option>145</option>
											<option>146</option>
											<option>147</option>
											<option>148</option>
											<option>149</option>
											<option>150</option>
											<option>155</option>
											<option>156</option>
											<option>157</option>
											<option>158</option>
											<option>159</option>
											<option>160</option>
											<option>166</option>
											<option>167</option>
											<option>168</option>
											<option>169</option>
											<option>170</option>
											<option>177</option>
											<option>178</option>
											<option>179</option>
											<option>180</option>
											<option>188</option>
											<option>189</option>
											<option>190</option>
											<option>199</option>
											<option>200</option>
											<option>220</option>
											<option>222</option>
											<option>223</option>
											<option>224</option>
											<option>225</option>
											<option>226</option>
											<option>227</option>
											<option>228</option>
											<option>229</option>
											<option>230</option>
											<option>233</option>
											<option>234</option>
											<option>235</option>
											<option>236</option>
											<option>237</option>
											<option>238</option>
											<option>239</option>
											<option>240</option>
											<option>244</option>
											<option>245</option>
											<option>246</option>
											<option>247</option>
											<option>248</option>
											<option>249</option>
											<option>250</option>
											<option>255</option>
											<option>256</option>
											<option>257</option>
											<option>258</option>
											<option>259</option>
											<option>260</option>
											<option>266</option>
											<option>267</option>
											<option>268</option>
											<option>269</option>
											<option>270</option>
											<option>277</option>
											<option>278</option>
											<option>279</option>
											<option>280</option>
											<option>288</option>
											<option>289</option>
											<option>290</option>
											<option>299</option>
											<option>300</option>
											<option>330</option>
											<option>333</option>
											<option>334</option>
											<option>335</option>
											<option>336</option>
											<option>337</option>
											<option>338</option>
											<option>339</option>
											<option>340</option>
											<option>344</option>
											<option>345</option>
											<option>346</option>
											<option>347</option>
											<option>348</option>
											<option>349</option>
											<option>350</option>
											<option>355</option>
											<option>356</option>
											<option>357</option>
											<option>358</option>
											<option>359</option>
											<option>360</option>
											<option>366</option>
											<option>367</option>
											<option>368</option>
											<option>369</option>
											<option>370</option>
											<option>377</option>
											<option>378</option>
											<option>379</option>
											<option>380</option>
											<option>388</option>
											<option>389</option>
											<option>390</option>
											<option>399</option>
											<option>400</option>
											<option>440</option>
											<option>444</option>
											<option>445</option>
											<option>446</option>
											<option>447</option>
											<option>448</option>
											<option>449</option>
											<option>450</option>
											<option>455</option>
											<option>456</option>
											<option>457</option>
											<option>458</option>
											<option>459</option>
											<option>460</option>
											<option>466</option>
											<option>467</option>
											<option>468</option>
											<option>469</option>
											<option>470</option>
											<option>477</option>
											<option>478</option>
											<option>479</option>
											<option>480</option>
											<option>488</option>
											<option>489</option>
											<option>490</option>
											<option>499</option>
											<option>500</option>
											<option>550</option>
											<option>555</option>
											<option>556</option>
											<option>557</option>
											<option>558</option>
											<option>559</option>
											<option>560</option>
											<option>566</option>
											<option>567</option>
											<option>568</option>
											<option>569</option>
											<option>570</option>
											<option>577</option>
											<option>578</option>
											<option>579</option>
											<option>580</option>
											<option>588</option>
											<option>589</option>
											<option>590</option>
											<option>599</option>
											<option>600</option>
											<option>660</option>
											<option>666</option>
											<option>667</option>
											<option>668</option>
											<option>669</option>
											<option>670</option>
											<option>677</option>
											<option>678</option>
											<option>679</option>
											<option>680</option>
											<option>688</option>
											<option>689</option>
											<option>690</option>
											<option>699</option>
											<option>700</option>
											<option>770</option>
											<option>777</option>
											<option>778</option>
											<option>779</option>
											<option>780</option>
											<option>788</option>
											<option>789</option>
											<option>790</option>
											<option>799</option>
											<option>800</option>
											<option>880</option>
											<option>888</option>
											<option>889</option>
											<option>890</option>
											<option>899</option>
											<option>900</option>
											<option>990</option>
											<option>999</option>
											<option>000</option>
										</select></td><td><input name="pnt[]" class="bid_number" id="l_8" onkeypress="return isNumberKey(event)"  type="number" min="10" /></td></tr><tr><td>10</td><td>
										<select name="num1[]"><option>1</option><option>2</option><option>3</option><option>4</option><option>5</option><option>6</option><option>7</option><option>8</option><option>9</option><option>0</option>
										</select></td><td>
										<select name="num2[]">
											<option>100</option>
											<option>110</option>
											<option>111</option>
											<option>112</option>
											<option>113</option>
											<option>114</option>
											<option>115</option>
											<option>116</option>
											<option>117</option>
											<option>118</option>
											<option>119</option>
											<option>120</option>
											<option>122</option>
											<option>123</option>
											<option>124</option>
											<option>125</option>
											<option>126</option>
											<option>127</option>
											<option>128</option>
											<option>129</option>
											<option>130</option>
											<option>133</option>
											<option>134</option>
											<option>135</option>
											<option>136</option>
											<option>137</option>
											<option>138</option>
											<option>139</option>
											<option>140</option>
											<option>144</option>
											<option>145</option>
											<option>146</option>
											<option>147</option>
											<option>148</option>
											<option>149</option>
											<option>150</option>
											<option>155</option>
											<option>156</option>
											<option>157</option>
											<option>158</option>
											<option>159</option>
											<option>160</option>
											<option>166</option>
											<option>167</option>
											<option>168</option>
											<option>169</option>
											<option>170</option>
											<option>177</option>
											<option>178</option>
											<option>179</option>
											<option>180</option>
											<option>188</option>
											<option>189</option>
											<option>190</option>
											<option>199</option>
											<option>200</option>
											<option>220</option>
											<option>222</option>
											<option>223</option>
											<option>224</option>
											<option>225</option>
											<option>226</option>
											<option>227</option>
											<option>228</option>
											<option>229</option>
											<option>230</option>
											<option>233</option>
											<option>234</option>
											<option>235</option>
											<option>236</option>
											<option>237</option>
											<option>238</option>
											<option>239</option>
											<option>240</option>
											<option>244</option>
											<option>245</option>
											<option>246</option>
											<option>247</option>
											<option>248</option>
											<option>249</option>
											<option>250</option>
											<option>255</option>
											<option>256</option>
											<option>257</option>
											<option>258</option>
											<option>259</option>
											<option>260</option>
											<option>266</option>
											<option>267</option>
											<option>268</option>
											<option>269</option>
											<option>270</option>
											<option>277</option>
											<option>278</option>
											<option>279</option>
											<option>280</option>
											<option>288</option>
											<option>289</option>
											<option>290</option>
											<option>299</option>
											<option>300</option>
											<option>330</option>
											<option>333</option>
											<option>334</option>
											<option>335</option>
											<option>336</option>
											<option>337</option>
											<option>338</option>
											<option>339</option>
											<option>340</option>
											<option>344</option>
											<option>345</option>
											<option>346</option>
											<option>347</option>
											<option>348</option>
											<option>349</option>
											<option>350</option>
											<option>355</option>
											<option>356</option>
											<option>357</option>
											<option>358</option>
											<option>359</option>
											<option>360</option>
											<option>366</option>
											<option>367</option>
											<option>368</option>
											<option>369</option>
											<option>370</option>
											<option>377</option>
											<option>378</option>
											<option>379</option>
											<option>380</option>
											<option>388</option>
											<option>389</option>
											<option>390</option>
											<option>399</option>
											<option>400</option>
											<option>440</option>
											<option>444</option>
											<option>445</option>
											<option>446</option>
											<option>447</option>
											<option>448</option>
											<option>449</option>
											<option>450</option>
											<option>455</option>
											<option>456</option>
											<option>457</option>
											<option>458</option>
											<option>459</option>
											<option>460</option>
											<option>466</option>
											<option>467</option>
											<option>468</option>
											<option>469</option>
											<option>470</option>
											<option>477</option>
											<option>478</option>
											<option>479</option>
											<option>480</option>
											<option>488</option>
											<option>489</option>
											<option>490</option>
											<option>499</option>
											<option>500</option>
											<option>550</option>
											<option>555</option>
											<option>556</option>
											<option>557</option>
											<option>558</option>
											<option>559</option>
											<option>560</option>
											<option>566</option>
											<option>567</option>
											<option>568</option>
											<option>569</option>
											<option>570</option>
											<option>577</option>
											<option>578</option>
											<option>579</option>
											<option>580</option>
											<option>588</option>
											<option>589</option>
											<option>590</option>
											<option>599</option>
											<option>600</option>
											<option>660</option>
											<option>666</option>
											<option>667</option>
											<option>668</option>
											<option>669</option>
											<option>670</option>
											<option>677</option>
											<option>678</option>
											<option>679</option>
											<option>680</option>
											<option>688</option>
											<option>689</option>
											<option>690</option>
											<option>699</option>
											<option>700</option>
											<option>770</option>
											<option>777</option>
											<option>778</option>
											<option>779</option>
											<option>780</option>
											<option>788</option>
											<option>789</option>
											<option>790</option>
											<option>799</option>
											<option>800</option>
											<option>880</option>
											<option>888</option>
											<option>889</option>
											<option>890</option>
											<option>899</option>
											<option>900</option>
											<option>990</option>
											<option>999</option>
											<option>000</option>
										</select></td><td><input name="pnt[]" class="bid_number" id="l_9" onkeypress="return isNumberKey(event)"  type="number" min="10" /></td></tr><tr><td></td><td></td><td>Total -></td><td><div id="tot1"><input type="text" readonly id="totalNumber"></div></td></tr></table>
<!--						</td>-->
<!---->
<!--						<td width="50%">-->
					</div>
					<div class="col-sm-6">
							<table  cellspacing='2' cellpadding='6' border='0'><tr><td>S.No.</td><td>Close Patti</td><td>Open Ank</td><td>Points</td><tr><td>1</td><td><select name="num1[]"><option>100</option><option>110</option><option>111</option><option>112</option><option>113</option><option>114</option><option>115</option><option>116</option><option>117</option><option>118</option><option>119</option><option>120</option><option>122</option><option>123</option><option>124</option><option>125</option><option>126</option><option>127</option><option>128</option><option>129</option><option>130</option><option>133</option><option>134</option><option>135</option><option>136</option><option>137</option><option>138</option><option>139</option><option>140</option><option>144</option><option>145</option><option>146</option><option>147</option><option>148</option><option>149</option><option>150</option><option>155</option><option>156</option><option>157</option><option>158</option><option>159</option><option>160</option><option>166</option><option>167</option><option>168</option><option>169</option><option>170</option><option>177</option><option>178</option><option>179</option><option>180</option><option>188</option><option>189</option><option>190</option><option>199</option><option>200</option><option>220</option><option>222</option><option>223</option><option>224</option><option>225</option><option>226</option><option>227</option><option>228</option><option>229</option><option>230</option><option>233</option><option>234</option><option>235</option><option>236</option><option>237</option><option>238</option><option>239</option><option>240</option><option>244</option><option>245</option><option>246</option><option>247</option><option>248</option><option>249</option><option>250</option><option>255</option><option>256</option><option>257</option><option>258</option><option>259</option><option>260</option><option>266</option><option>267</option><option>268</option><option>269</option><option>270</option><option>277</option><option>278</option><option>279</option><option>280</option><option>288</option><option>289</option><option>290</option><option>299</option><option>300</option><option>330</option><option>333</option><option>334</option><option>335</option><option>336</option><option>337</option><option>338</option><option>339</option><option>340</option><option>344</option><option>345</option><option>346</option><option>347</option><option>348</option><option>349</option><option>350</option><option>355</option><option>356</option><option>357</option><option>358</option><option>359</option><option>360</option><option>366</option><option>367</option><option>368</option><option>369</option><option>370</option><option>377</option><option>378</option><option>379</option><option>380</option><option>388</option><option>389</option><option>390</option><option>399</option><option>400</option><option>440</option><option>444</option><option>445</option><option>446</option><option>447</option><option>448</option><option>449</option><option>450</option><option>455</option><option>456</option><option>457</option><option>458</option><option>459</option><option>460</option><option>466</option><option>467</option><option>468</option><option>469</option><option>470</option><option>477</option><option>478</option><option>479</option><option>480</option><option>488</option><option>489</option><option>490</option><option>499</option><option>500</option><option>550</option><option>555</option><option>556</option><option>557</option><option>558</option><option>559</option><option>560</option><option>566</option><option>567</option><option>568</option><option>569</option><option>570</option><option>577</option><option>578</option><option>579</option><option>580</option><option>588</option><option>589</option><option>590</option><option>599</option><option>600</option><option>660</option><option>666</option><option>667</option><option>668</option><option>669</option><option>670</option><option>677</option><option>678</option><option>679</option><option>680</option><option>688</option><option>689</option><option>690</option><option>699</option><option>700</option><option>770</option><option>777</option><option>778</option><option>779</option><option>780</option><option>788</option><option>789</option><option>790</option><option>799</option><option>800</option><option>880</option><option>888</option><option>889</option><option>890</option><option>899</option><option>900</option><option>990</option><option>999</option><option>000</option></select></td><td><select name="num2[]"><option>1</option>
											<option>2</option>
											<option>3</option>
											<option>4</option>
											<option>5</option>
											<option>6</option>
											<option>7</option>
											<option>8</option>
											<option>9</option>
											<option>0</option>
										</select></td><td><input name="pnt[]" class="bid_number1" id="r_0" onkeypress="return isNumberKey(event)"  type="number" min="10" /></td></tr><tr><td>2</td><td><select name="num1[]"><option>100</option><option>110</option><option>111</option><option>112</option><option>113</option><option>114</option><option>115</option><option>116</option><option>117</option><option>118</option><option>119</option><option>120</option><option>122</option><option>123</option><option>124</option><option>125</option><option>126</option><option>127</option><option>128</option><option>129</option><option>130</option><option>133</option><option>134</option><option>135</option><option>136</option><option>137</option><option>138</option><option>139</option><option>140</option><option>144</option><option>145</option><option>146</option><option>147</option><option>148</option><option>149</option><option>150</option><option>155</option><option>156</option><option>157</option><option>158</option><option>159</option><option>160</option><option>166</option><option>167</option><option>168</option><option>169</option><option>170</option><option>177</option><option>178</option><option>179</option><option>180</option><option>188</option><option>189</option><option>190</option><option>199</option><option>200</option><option>220</option><option>222</option><option>223</option><option>224</option><option>225</option><option>226</option><option>227</option><option>228</option><option>229</option><option>230</option><option>233</option><option>234</option><option>235</option><option>236</option><option>237</option><option>238</option><option>239</option><option>240</option><option>244</option><option>245</option><option>246</option><option>247</option><option>248</option><option>249</option><option>250</option><option>255</option><option>256</option><option>257</option><option>258</option><option>259</option><option>260</option><option>266</option><option>267</option><option>268</option><option>269</option><option>270</option><option>277</option><option>278</option><option>279</option><option>280</option><option>288</option><option>289</option><option>290</option><option>299</option><option>300</option><option>330</option><option>333</option><option>334</option><option>335</option><option>336</option><option>337</option><option>338</option><option>339</option><option>340</option><option>344</option><option>345</option><option>346</option><option>347</option><option>348</option><option>349</option><option>350</option><option>355</option><option>356</option><option>357</option><option>358</option><option>359</option><option>360</option><option>366</option><option>367</option><option>368</option><option>369</option><option>370</option><option>377</option><option>378</option><option>379</option><option>380</option><option>388</option><option>389</option><option>390</option><option>399</option><option>400</option><option>440</option><option>444</option><option>445</option><option>446</option><option>447</option><option>448</option><option>449</option><option>450</option><option>455</option><option>456</option><option>457</option><option>458</option><option>459</option><option>460</option><option>466</option><option>467</option><option>468</option><option>469</option><option>470</option><option>477</option><option>478</option><option>479</option><option>480</option><option>488</option><option>489</option><option>490</option><option>499</option><option>500</option><option>550</option><option>555</option><option>556</option><option>557</option><option>558</option><option>559</option><option>560</option><option>566</option><option>567</option><option>568</option><option>569</option><option>570</option><option>577</option><option>578</option><option>579</option><option>580</option><option>588</option><option>589</option><option>590</option><option>599</option><option>600</option><option>660</option><option>666</option><option>667</option><option>668</option><option>669</option><option>670</option><option>677</option><option>678</option><option>679</option><option>680</option><option>688</option><option>689</option><option>690</option><option>699</option><option>700</option><option>770</option><option>777</option><option>778</option><option>779</option><option>780</option><option>788</option><option>789</option><option>790</option><option>799</option><option>800</option><option>880</option><option>888</option><option>889</option><option>890</option><option>899</option><option>900</option><option>990</option><option>999</option><option>000</option></select></td><td><select name="num2[]"><option>1</option>
											<option>2</option>
											<option>3</option>
											<option>4</option>
											<option>5</option>
											<option>6</option>
											<option>7</option>
											<option>8</option>
											<option>9</option>
											<option>0</option>
										</select></td><td><input name="pnt[]" id="r_1" class="bid_number1" onkeypress="return isNumberKey(event)"  type="number" min="10" /></td></tr><tr><td>3</td><td><select name="num1[]"><option>100</option><option>110</option><option>111</option><option>112</option><option>113</option><option>114</option><option>115</option><option>116</option><option>117</option><option>118</option><option>119</option><option>120</option><option>122</option><option>123</option><option>124</option><option>125</option><option>126</option><option>127</option><option>128</option><option>129</option><option>130</option><option>133</option><option>134</option><option>135</option><option>136</option><option>137</option><option>138</option><option>139</option><option>140</option><option>144</option><option>145</option><option>146</option><option>147</option><option>148</option><option>149</option><option>150</option><option>155</option><option>156</option><option>157</option><option>158</option><option>159</option><option>160</option><option>166</option><option>167</option><option>168</option><option>169</option><option>170</option><option>177</option><option>178</option><option>179</option><option>180</option><option>188</option><option>189</option><option>190</option><option>199</option><option>200</option><option>220</option><option>222</option><option>223</option><option>224</option><option>225</option><option>226</option><option>227</option><option>228</option><option>229</option><option>230</option><option>233</option><option>234</option><option>235</option><option>236</option><option>237</option><option>238</option><option>239</option><option>240</option><option>244</option><option>245</option><option>246</option><option>247</option><option>248</option><option>249</option><option>250</option><option>255</option><option>256</option><option>257</option><option>258</option><option>259</option><option>260</option><option>266</option><option>267</option><option>268</option><option>269</option><option>270</option><option>277</option><option>278</option><option>279</option><option>280</option><option>288</option><option>289</option><option>290</option><option>299</option><option>300</option><option>330</option><option>333</option><option>334</option><option>335</option><option>336</option><option>337</option><option>338</option><option>339</option><option>340</option><option>344</option><option>345</option><option>346</option><option>347</option><option>348</option><option>349</option><option>350</option><option>355</option><option>356</option><option>357</option><option>358</option><option>359</option><option>360</option><option>366</option><option>367</option><option>368</option><option>369</option><option>370</option><option>377</option><option>378</option><option>379</option><option>380</option><option>388</option><option>389</option><option>390</option><option>399</option><option>400</option><option>440</option><option>444</option><option>445</option><option>446</option><option>447</option><option>448</option><option>449</option><option>450</option><option>455</option><option>456</option><option>457</option><option>458</option><option>459</option><option>460</option><option>466</option><option>467</option><option>468</option><option>469</option><option>470</option><option>477</option><option>478</option><option>479</option><option>480</option><option>488</option><option>489</option><option>490</option><option>499</option><option>500</option><option>550</option><option>555</option><option>556</option><option>557</option><option>558</option><option>559</option><option>560</option><option>566</option><option>567</option><option>568</option><option>569</option><option>570</option><option>577</option><option>578</option><option>579</option><option>580</option><option>588</option><option>589</option><option>590</option><option>599</option><option>600</option><option>660</option><option>666</option><option>667</option><option>668</option><option>669</option><option>670</option><option>677</option><option>678</option><option>679</option><option>680</option><option>688</option><option>689</option><option>690</option><option>699</option><option>700</option><option>770</option><option>777</option><option>778</option><option>779</option><option>780</option><option>788</option><option>789</option><option>790</option><option>799</option><option>800</option><option>880</option><option>888</option><option>889</option><option>890</option><option>899</option><option>900</option><option>990</option><option>999</option><option>000</option></select></td><td><select name="num2[]"><option>1</option>
											<option>2</option>
											<option>3</option>
											<option>4</option>
											<option>5</option>
											<option>6</option>
											<option>7</option>
											<option>8</option>
											<option>9</option>
											<option>0</option>
										</select></td><td><input name="pnt[]" class="bid_number1" id="r_2" onkeypress="return isNumberKey(event)"  type="number" min="10" /></td></tr><tr><td>4</td><td><select name="num1[]"><option>100</option><option>110</option><option>111</option><option>112</option><option>113</option><option>114</option><option>115</option><option>116</option><option>117</option><option>118</option><option>119</option><option>120</option><option>122</option><option>123</option><option>124</option><option>125</option><option>126</option><option>127</option><option>128</option><option>129</option><option>130</option><option>133</option><option>134</option><option>135</option><option>136</option><option>137</option><option>138</option><option>139</option><option>140</option><option>144</option><option>145</option><option>146</option><option>147</option><option>148</option><option>149</option><option>150</option><option>155</option><option>156</option><option>157</option><option>158</option><option>159</option><option>160</option><option>166</option><option>167</option><option>168</option><option>169</option><option>170</option><option>177</option><option>178</option><option>179</option><option>180</option><option>188</option><option>189</option><option>190</option><option>199</option><option>200</option><option>220</option><option>222</option><option>223</option><option>224</option><option>225</option><option>226</option><option>227</option><option>228</option><option>229</option><option>230</option><option>233</option><option>234</option><option>235</option><option>236</option><option>237</option><option>238</option><option>239</option><option>240</option><option>244</option><option>245</option><option>246</option><option>247</option><option>248</option><option>249</option><option>250</option><option>255</option><option>256</option><option>257</option><option>258</option><option>259</option><option>260</option><option>266</option><option>267</option><option>268</option><option>269</option><option>270</option><option>277</option><option>278</option><option>279</option><option>280</option><option>288</option><option>289</option><option>290</option><option>299</option><option>300</option><option>330</option><option>333</option><option>334</option><option>335</option><option>336</option><option>337</option><option>338</option><option>339</option><option>340</option><option>344</option><option>345</option><option>346</option><option>347</option><option>348</option><option>349</option><option>350</option><option>355</option><option>356</option><option>357</option><option>358</option><option>359</option><option>360</option><option>366</option><option>367</option><option>368</option><option>369</option><option>370</option><option>377</option><option>378</option><option>379</option><option>380</option><option>388</option><option>389</option><option>390</option><option>399</option><option>400</option><option>440</option><option>444</option><option>445</option><option>446</option><option>447</option><option>448</option><option>449</option><option>450</option><option>455</option><option>456</option><option>457</option><option>458</option><option>459</option><option>460</option><option>466</option><option>467</option><option>468</option><option>469</option><option>470</option><option>477</option><option>478</option><option>479</option><option>480</option><option>488</option><option>489</option><option>490</option><option>499</option><option>500</option><option>550</option><option>555</option><option>556</option><option>557</option><option>558</option><option>559</option><option>560</option><option>566</option><option>567</option><option>568</option><option>569</option><option>570</option><option>577</option><option>578</option><option>579</option><option>580</option><option>588</option><option>589</option><option>590</option><option>599</option><option>600</option><option>660</option><option>666</option><option>667</option><option>668</option><option>669</option><option>670</option><option>677</option><option>678</option><option>679</option><option>680</option><option>688</option><option>689</option><option>690</option><option>699</option><option>700</option><option>770</option><option>777</option><option>778</option><option>779</option><option>780</option><option>788</option><option>789</option><option>790</option><option>799</option><option>800</option><option>880</option><option>888</option><option>889</option><option>890</option><option>899</option><option>900</option><option>990</option><option>999</option><option>000</option></select></td><td><select name="num2[]"><option>1</option>
											<option>2</option>
											<option>3</option>
											<option>4</option>
											<option>5</option>
											<option>6</option>
											<option>7</option>
											<option>8</option>
											<option>9</option>
											<option>0</option>
										</select></td><td><input name="pnt[]" class="bid_number1" id="r_3" onkeypress="return isNumberKey(event)"  type="number" min="10" /></td></tr><tr><td>5</td><td><select name="num1[]"><option>100</option><option>110</option><option>111</option><option>112</option><option>113</option><option>114</option><option>115</option><option>116</option><option>117</option><option>118</option><option>119</option><option>120</option><option>122</option><option>123</option><option>124</option><option>125</option><option>126</option><option>127</option><option>128</option><option>129</option><option>130</option><option>133</option><option>134</option><option>135</option><option>136</option><option>137</option><option>138</option><option>139</option><option>140</option><option>144</option><option>145</option><option>146</option><option>147</option><option>148</option><option>149</option><option>150</option><option>155</option><option>156</option><option>157</option><option>158</option><option>159</option><option>160</option><option>166</option><option>167</option><option>168</option><option>169</option><option>170</option><option>177</option><option>178</option><option>179</option><option>180</option><option>188</option><option>189</option><option>190</option><option>199</option><option>200</option><option>220</option><option>222</option><option>223</option><option>224</option><option>225</option><option>226</option><option>227</option><option>228</option><option>229</option><option>230</option><option>233</option><option>234</option><option>235</option><option>236</option><option>237</option><option>238</option><option>239</option><option>240</option><option>244</option><option>245</option><option>246</option><option>247</option><option>248</option><option>249</option><option>250</option><option>255</option><option>256</option><option>257</option><option>258</option><option>259</option><option>260</option><option>266</option><option>267</option><option>268</option><option>269</option><option>270</option><option>277</option><option>278</option><option>279</option><option>280</option><option>288</option><option>289</option><option>290</option><option>299</option><option>300</option><option>330</option><option>333</option><option>334</option><option>335</option><option>336</option><option>337</option><option>338</option><option>339</option><option>340</option><option>344</option><option>345</option><option>346</option><option>347</option><option>348</option><option>349</option><option>350</option><option>355</option><option>356</option><option>357</option><option>358</option><option>359</option><option>360</option><option>366</option><option>367</option><option>368</option><option>369</option><option>370</option><option>377</option><option>378</option><option>379</option><option>380</option><option>388</option><option>389</option><option>390</option><option>399</option><option>400</option><option>440</option><option>444</option><option>445</option><option>446</option><option>447</option><option>448</option><option>449</option><option>450</option><option>455</option><option>456</option><option>457</option><option>458</option><option>459</option><option>460</option><option>466</option><option>467</option><option>468</option><option>469</option><option>470</option><option>477</option><option>478</option><option>479</option><option>480</option><option>488</option><option>489</option><option>490</option><option>499</option><option>500</option><option>550</option><option>555</option><option>556</option><option>557</option><option>558</option><option>559</option><option>560</option><option>566</option><option>567</option><option>568</option><option>569</option><option>570</option><option>577</option><option>578</option><option>579</option><option>580</option><option>588</option><option>589</option><option>590</option><option>599</option><option>600</option><option>660</option><option>666</option><option>667</option><option>668</option><option>669</option><option>670</option><option>677</option><option>678</option><option>679</option><option>680</option><option>688</option><option>689</option><option>690</option><option>699</option><option>700</option><option>770</option><option>777</option><option>778</option><option>779</option><option>780</option><option>788</option><option>789</option><option>790</option><option>799</option><option>800</option><option>880</option><option>888</option><option>889</option><option>890</option><option>899</option><option>900</option><option>990</option><option>999</option><option>000</option></select></td><td><select name="num2[]"><option>1</option>
											<option>2</option>
											<option>3</option>
											<option>4</option>
											<option>5</option>
											<option>6</option>
											<option>7</option>
											<option>8</option>
											<option>9</option>
											<option>0</option>
										</select></td><td><input name="pnt[]" class="bid_number1" id="r_4" onkeypress="return isNumberKey(event)"  type="number" min="10" /></td></tr><tr><td>6</td><td><select name="num1[]"><option>100</option><option>110</option><option>111</option><option>112</option><option>113</option><option>114</option><option>115</option><option>116</option><option>117</option><option>118</option><option>119</option><option>120</option><option>122</option><option>123</option><option>124</option><option>125</option><option>126</option><option>127</option><option>128</option><option>129</option><option>130</option><option>133</option><option>134</option><option>135</option><option>136</option><option>137</option><option>138</option><option>139</option><option>140</option><option>144</option><option>145</option><option>146</option><option>147</option><option>148</option><option>149</option><option>150</option><option>155</option><option>156</option><option>157</option><option>158</option><option>159</option><option>160</option><option>166</option><option>167</option><option>168</option><option>169</option><option>170</option><option>177</option><option>178</option><option>179</option><option>180</option><option>188</option><option>189</option><option>190</option><option>199</option><option>200</option><option>220</option><option>222</option><option>223</option><option>224</option><option>225</option><option>226</option><option>227</option><option>228</option><option>229</option><option>230</option><option>233</option><option>234</option><option>235</option><option>236</option><option>237</option><option>238</option><option>239</option><option>240</option><option>244</option><option>245</option><option>246</option><option>247</option><option>248</option><option>249</option><option>250</option><option>255</option><option>256</option><option>257</option><option>258</option><option>259</option><option>260</option><option>266</option><option>267</option><option>268</option><option>269</option><option>270</option><option>277</option><option>278</option><option>279</option><option>280</option><option>288</option><option>289</option><option>290</option><option>299</option><option>300</option><option>330</option><option>333</option><option>334</option><option>335</option><option>336</option><option>337</option><option>338</option><option>339</option><option>340</option><option>344</option><option>345</option><option>346</option><option>347</option><option>348</option><option>349</option><option>350</option><option>355</option><option>356</option><option>357</option><option>358</option><option>359</option><option>360</option><option>366</option><option>367</option><option>368</option><option>369</option><option>370</option><option>377</option><option>378</option><option>379</option><option>380</option><option>388</option><option>389</option><option>390</option><option>399</option><option>400</option><option>440</option><option>444</option><option>445</option><option>446</option><option>447</option><option>448</option><option>449</option><option>450</option><option>455</option><option>456</option><option>457</option><option>458</option><option>459</option><option>460</option><option>466</option><option>467</option><option>468</option><option>469</option><option>470</option><option>477</option><option>478</option><option>479</option><option>480</option><option>488</option><option>489</option><option>490</option><option>499</option><option>500</option><option>550</option><option>555</option><option>556</option><option>557</option><option>558</option><option>559</option><option>560</option><option>566</option><option>567</option><option>568</option><option>569</option><option>570</option><option>577</option><option>578</option><option>579</option><option>580</option><option>588</option><option>589</option><option>590</option><option>599</option><option>600</option><option>660</option><option>666</option><option>667</option><option>668</option><option>669</option><option>670</option><option>677</option><option>678</option><option>679</option><option>680</option><option>688</option><option>689</option><option>690</option><option>699</option><option>700</option><option>770</option><option>777</option><option>778</option><option>779</option><option>780</option><option>788</option><option>789</option><option>790</option><option>799</option><option>800</option><option>880</option><option>888</option><option>889</option><option>890</option><option>899</option><option>900</option><option>990</option><option>999</option><option>000</option></select></td><td><select name="num2[]"><option>1</option>
											<option>2</option>
											<option>3</option>
											<option>4</option>
											<option>5</option>
											<option>6</option>
											<option>7</option>
											<option>8</option>
											<option>9</option>
											<option>0</option>
										</select></td><td><input name="pnt[]"  class="bid_number1" id="r_5" onkeypress="return isNumberKey(event)"  type="number" min="10" /></td></tr><tr><td>7</td><td><select name="num1[]"><option>100</option><option>110</option><option>111</option><option>112</option><option>113</option><option>114</option><option>115</option><option>116</option><option>117</option><option>118</option><option>119</option><option>120</option><option>122</option><option>123</option><option>124</option><option>125</option><option>126</option><option>127</option><option>128</option><option>129</option><option>130</option><option>133</option><option>134</option><option>135</option><option>136</option><option>137</option><option>138</option><option>139</option><option>140</option><option>144</option><option>145</option><option>146</option><option>147</option><option>148</option><option>149</option><option>150</option><option>155</option><option>156</option><option>157</option><option>158</option><option>159</option><option>160</option><option>166</option><option>167</option><option>168</option><option>169</option><option>170</option><option>177</option><option>178</option><option>179</option><option>180</option><option>188</option><option>189</option><option>190</option><option>199</option><option>200</option><option>220</option><option>222</option><option>223</option><option>224</option><option>225</option><option>226</option><option>227</option><option>228</option><option>229</option><option>230</option><option>233</option><option>234</option><option>235</option><option>236</option><option>237</option><option>238</option><option>239</option><option>240</option><option>244</option><option>245</option><option>246</option><option>247</option><option>248</option><option>249</option><option>250</option><option>255</option><option>256</option><option>257</option><option>258</option><option>259</option><option>260</option><option>266</option><option>267</option><option>268</option><option>269</option><option>270</option><option>277</option><option>278</option><option>279</option><option>280</option><option>288</option><option>289</option><option>290</option><option>299</option><option>300</option><option>330</option><option>333</option><option>334</option><option>335</option><option>336</option><option>337</option><option>338</option><option>339</option><option>340</option><option>344</option><option>345</option><option>346</option><option>347</option><option>348</option><option>349</option><option>350</option><option>355</option><option>356</option><option>357</option><option>358</option><option>359</option><option>360</option><option>366</option><option>367</option><option>368</option><option>369</option><option>370</option><option>377</option><option>378</option><option>379</option><option>380</option><option>388</option><option>389</option><option>390</option><option>399</option><option>400</option><option>440</option><option>444</option><option>445</option><option>446</option><option>447</option><option>448</option><option>449</option><option>450</option><option>455</option><option>456</option><option>457</option><option>458</option><option>459</option><option>460</option><option>466</option><option>467</option><option>468</option><option>469</option><option>470</option><option>477</option><option>478</option><option>479</option><option>480</option><option>488</option><option>489</option><option>490</option><option>499</option><option>500</option><option>550</option><option>555</option><option>556</option><option>557</option><option>558</option><option>559</option><option>560</option><option>566</option><option>567</option><option>568</option><option>569</option><option>570</option><option>577</option><option>578</option><option>579</option><option>580</option><option>588</option><option>589</option><option>590</option><option>599</option><option>600</option><option>660</option><option>666</option><option>667</option><option>668</option><option>669</option><option>670</option><option>677</option><option>678</option><option>679</option><option>680</option><option>688</option><option>689</option><option>690</option><option>699</option><option>700</option><option>770</option><option>777</option><option>778</option><option>779</option><option>780</option><option>788</option><option>789</option><option>790</option><option>799</option><option>800</option><option>880</option><option>888</option><option>889</option><option>890</option><option>899</option><option>900</option><option>990</option><option>999</option><option>000</option></select></td><td><select name="num2[]"><option>1</option>
											<option>2</option>
											<option>3</option>
											<option>4</option>
											<option>5</option>
											<option>6</option>
											<option>7</option>
											<option>8</option>
											<option>9</option>
											<option>0</option>
										</select></td><td><input name="pnt[]" class="bid_number1" id="r_6" onkeypress="return isNumberKey(event)"  type="number" min="10" /></td></tr><tr><td>8</td><td><select name="num1[]"><option>100</option><option>110</option><option>111</option><option>112</option><option>113</option><option>114</option><option>115</option><option>116</option><option>117</option><option>118</option><option>119</option><option>120</option><option>122</option><option>123</option><option>124</option><option>125</option><option>126</option><option>127</option><option>128</option><option>129</option><option>130</option><option>133</option><option>134</option><option>135</option><option>136</option><option>137</option><option>138</option><option>139</option><option>140</option><option>144</option><option>145</option><option>146</option><option>147</option><option>148</option><option>149</option><option>150</option><option>155</option><option>156</option><option>157</option><option>158</option><option>159</option><option>160</option><option>166</option><option>167</option><option>168</option><option>169</option><option>170</option><option>177</option><option>178</option><option>179</option><option>180</option><option>188</option><option>189</option><option>190</option><option>199</option><option>200</option><option>220</option><option>222</option><option>223</option><option>224</option><option>225</option><option>226</option><option>227</option><option>228</option><option>229</option><option>230</option><option>233</option><option>234</option><option>235</option><option>236</option><option>237</option><option>238</option><option>239</option><option>240</option><option>244</option><option>245</option><option>246</option><option>247</option><option>248</option><option>249</option><option>250</option><option>255</option><option>256</option><option>257</option><option>258</option><option>259</option><option>260</option><option>266</option><option>267</option><option>268</option><option>269</option><option>270</option><option>277</option><option>278</option><option>279</option><option>280</option><option>288</option><option>289</option><option>290</option><option>299</option><option>300</option><option>330</option><option>333</option><option>334</option><option>335</option><option>336</option><option>337</option><option>338</option><option>339</option><option>340</option><option>344</option><option>345</option><option>346</option><option>347</option><option>348</option><option>349</option><option>350</option><option>355</option><option>356</option><option>357</option><option>358</option><option>359</option><option>360</option><option>366</option><option>367</option><option>368</option><option>369</option><option>370</option><option>377</option><option>378</option><option>379</option><option>380</option><option>388</option><option>389</option><option>390</option><option>399</option><option>400</option><option>440</option><option>444</option><option>445</option><option>446</option><option>447</option><option>448</option><option>449</option><option>450</option><option>455</option><option>456</option><option>457</option><option>458</option><option>459</option><option>460</option><option>466</option><option>467</option><option>468</option><option>469</option><option>470</option><option>477</option><option>478</option><option>479</option><option>480</option><option>488</option><option>489</option><option>490</option><option>499</option><option>500</option><option>550</option><option>555</option><option>556</option><option>557</option><option>558</option><option>559</option><option>560</option><option>566</option><option>567</option><option>568</option><option>569</option><option>570</option><option>577</option><option>578</option><option>579</option><option>580</option><option>588</option><option>589</option><option>590</option><option>599</option><option>600</option><option>660</option><option>666</option><option>667</option><option>668</option><option>669</option><option>670</option><option>677</option><option>678</option><option>679</option><option>680</option><option>688</option><option>689</option><option>690</option><option>699</option><option>700</option><option>770</option><option>777</option><option>778</option><option>779</option><option>780</option><option>788</option><option>789</option><option>790</option><option>799</option><option>800</option><option>880</option><option>888</option><option>889</option><option>890</option><option>899</option><option>900</option><option>990</option><option>999</option><option>000</option></select></td><td><select name="num2[]"><option>1</option>
											<option>2</option>
											<option>3</option>
											<option>4</option>
											<option>5</option>
											<option>6</option>
											<option>7</option>
											<option>8</option>
											<option>9</option>
											<option>0</option>
										</select></td><td><input name="pnt[]" class="bid_number1" id="r_7" onkeypress="return isNumberKey(event)"  type="number" min="10" /></td></tr><tr><td>9</td><td><select name="num1[]"><option>100</option><option>110</option><option>111</option><option>112</option><option>113</option><option>114</option><option>115</option><option>116</option><option>117</option><option>118</option><option>119</option><option>120</option><option>122</option><option>123</option><option>124</option><option>125</option><option>126</option><option>127</option><option>128</option><option>129</option><option>130</option><option>133</option><option>134</option><option>135</option><option>136</option><option>137</option><option>138</option><option>139</option><option>140</option><option>144</option><option>145</option><option>146</option><option>147</option><option>148</option><option>149</option><option>150</option><option>155</option><option>156</option><option>157</option><option>158</option><option>159</option><option>160</option><option>166</option><option>167</option><option>168</option><option>169</option><option>170</option><option>177</option><option>178</option><option>179</option><option>180</option><option>188</option><option>189</option><option>190</option><option>199</option><option>200</option><option>220</option><option>222</option><option>223</option><option>224</option><option>225</option><option>226</option><option>227</option><option>228</option><option>229</option><option>230</option><option>233</option><option>234</option><option>235</option><option>236</option><option>237</option><option>238</option><option>239</option><option>240</option><option>244</option><option>245</option><option>246</option><option>247</option><option>248</option><option>249</option><option>250</option><option>255</option><option>256</option><option>257</option><option>258</option><option>259</option><option>260</option><option>266</option><option>267</option><option>268</option><option>269</option><option>270</option><option>277</option><option>278</option><option>279</option><option>280</option><option>288</option><option>289</option><option>290</option><option>299</option><option>300</option><option>330</option><option>333</option><option>334</option><option>335</option><option>336</option><option>337</option><option>338</option><option>339</option><option>340</option><option>344</option><option>345</option><option>346</option><option>347</option><option>348</option><option>349</option><option>350</option><option>355</option><option>356</option><option>357</option><option>358</option><option>359</option><option>360</option><option>366</option><option>367</option><option>368</option><option>369</option><option>370</option><option>377</option><option>378</option><option>379</option><option>380</option><option>388</option><option>389</option><option>390</option><option>399</option><option>400</option><option>440</option><option>444</option><option>445</option><option>446</option><option>447</option><option>448</option><option>449</option><option>450</option><option>455</option><option>456</option><option>457</option><option>458</option><option>459</option><option>460</option><option>466</option><option>467</option><option>468</option><option>469</option><option>470</option><option>477</option><option>478</option><option>479</option><option>480</option><option>488</option><option>489</option><option>490</option><option>499</option><option>500</option><option>550</option><option>555</option><option>556</option><option>557</option><option>558</option><option>559</option><option>560</option><option>566</option><option>567</option><option>568</option><option>569</option><option>570</option><option>577</option><option>578</option><option>579</option><option>580</option><option>588</option><option>589</option><option>590</option><option>599</option><option>600</option><option>660</option><option>666</option><option>667</option><option>668</option><option>669</option><option>670</option><option>677</option><option>678</option><option>679</option><option>680</option><option>688</option><option>689</option><option>690</option><option>699</option><option>700</option><option>770</option><option>777</option><option>778</option><option>779</option><option>780</option><option>788</option><option>789</option><option>790</option><option>799</option><option>800</option><option>880</option><option>888</option><option>889</option><option>890</option><option>899</option><option>900</option><option>990</option><option>999</option><option>000</option></select></td><td><select name="num2[]"><option>1</option>
											<option>2</option>
											<option>3</option>
											<option>4</option>
											<option>5</option>
											<option>6</option>
											<option>7</option>
											<option>8</option>
											<option>9</option>
											<option>0</option>
										</select></td><td><input name="pnt[]" class="bid_number1" id="r_8" onkeypress="return isNumberKey(event)"  type="number" min="10" /></td></tr><tr><td>10</td><td><select name="num1[]"><option>100</option><option>110</option><option>111</option><option>112</option><option>113</option><option>114</option><option>115</option><option>116</option><option>117</option><option>118</option><option>119</option><option>120</option><option>122</option><option>123</option><option>124</option><option>125</option><option>126</option><option>127</option><option>128</option><option>129</option><option>130</option><option>133</option><option>134</option><option>135</option><option>136</option><option>137</option><option>138</option><option>139</option><option>140</option><option>144</option><option>145</option><option>146</option><option>147</option><option>148</option><option>149</option><option>150</option><option>155</option><option>156</option><option>157</option><option>158</option><option>159</option><option>160</option><option>166</option><option>167</option><option>168</option><option>169</option><option>170</option><option>177</option><option>178</option><option>179</option><option>180</option><option>188</option><option>189</option><option>190</option><option>199</option><option>200</option><option>220</option><option>222</option><option>223</option><option>224</option><option>225</option><option>226</option><option>227</option><option>228</option><option>229</option><option>230</option><option>233</option><option>234</option><option>235</option><option>236</option><option>237</option><option>238</option><option>239</option><option>240</option><option>244</option><option>245</option><option>246</option><option>247</option><option>248</option><option>249</option><option>250</option><option>255</option><option>256</option><option>257</option><option>258</option><option>259</option><option>260</option><option>266</option><option>267</option><option>268</option><option>269</option><option>270</option><option>277</option><option>278</option><option>279</option><option>280</option><option>288</option><option>289</option><option>290</option><option>299</option><option>300</option><option>330</option><option>333</option><option>334</option><option>335</option><option>336</option><option>337</option><option>338</option><option>339</option><option>340</option><option>344</option><option>345</option><option>346</option><option>347</option><option>348</option><option>349</option><option>350</option><option>355</option><option>356</option><option>357</option><option>358</option><option>359</option><option>360</option><option>366</option><option>367</option><option>368</option><option>369</option><option>370</option><option>377</option><option>378</option><option>379</option><option>380</option><option>388</option><option>389</option><option>390</option><option>399</option><option>400</option><option>440</option><option>444</option><option>445</option><option>446</option><option>447</option><option>448</option><option>449</option><option>450</option><option>455</option><option>456</option><option>457</option><option>458</option><option>459</option><option>460</option><option>466</option><option>467</option><option>468</option><option>469</option><option>470</option><option>477</option><option>478</option><option>479</option><option>480</option><option>488</option><option>489</option><option>490</option><option>499</option><option>500</option><option>550</option><option>555</option><option>556</option><option>557</option><option>558</option><option>559</option><option>560</option><option>566</option><option>567</option><option>568</option><option>569</option><option>570</option><option>577</option><option>578</option><option>579</option><option>580</option><option>588</option><option>589</option><option>590</option><option>599</option><option>600</option><option>660</option><option>666</option><option>667</option><option>668</option><option>669</option><option>670</option><option>677</option><option>678</option><option>679</option><option>680</option><option>688</option><option>689</option><option>690</option><option>699</option><option>700</option><option>770</option><option>777</option><option>778</option><option>779</option><option>780</option><option>788</option><option>789</option><option>790</option><option>799</option><option>800</option><option>880</option><option>888</option><option>889</option><option>890</option><option>899</option><option>900</option><option>990</option><option>999</option><option>000</option></select></td><td><select name="num2[]"><option>1</option>
											<option>2</option>
											<option>3</option>
											<option>4</option>
											<option>5</option>
											<option>6</option>
											<option>7</option>
											<option>8</option>
											<option>9</option>
											<option>0</option>
										</select></td><td><input name="pnt[]" class="bid_number1" id="r_9" onkeypress="return isNumberKey(event)"  type="number" min="10" /></td></tr><tr><td></td><td></td><td>Total -></td><td><div id="tot2"><input type="text" name="total2" value="0" id="totalAmount2"></div></td></tr><tr><td></td><td></td><td>Grand Total -></td><td><div id="tot3"><input type="text" name="total_amount" id="totalAmount3"></div></td></tr>
							</table>
						<input type="hidden" name="user_id" value="<?=$this->session->userdata('user')?>">
					</div>
				</div>
					<div class="row">
						<div class="col-sm-12">
<!--						</td>-->
<!--					</tr>-->
<!--				</table>-->
					<?php  if($this->session->has_userdata('login')){
					echo '<div class="play_sub_opt"><button type="submit" class="btn btn-success" value="">Submit</button>';
					}
					else{
						echo '<a href="'.base_url('/login').'"> <button type="button" class="btn btn-info pull-right submit_button">Submit</button></a>';
					}?>
					&nbsp;&nbsp;<button type="reset" onClick="rst('0');" class="btn btn-danger" value="Reset">Reset</button>
					<center><font color=blue>*After Confirm Submission no changes will be made at any cost and it will be fixed bidding</font><br><b>Note :- Sunday Milan Day Result Time Open 2:10pm & Close 4:10<br>Please Play before Open 1:50pm & Close 3:50pm<br>Note - Minimum Bet on any any number should be 10 points</b></center>
					</div>
					</div>
			</form>
				</div>
		</form>
	</div>
</div>

	<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
		<div class="modal-dialog" role="document">
			<div class="modal-content">
				<div class="modal-header">
					<h5 class="modal-title">Bid Details</h5>
					<button type="button" class="close" data-dismiss="modal" aria-label="Close">
						<span aria-hidden="true">&times;</span>
					</button>
				</div>
				<div class="modal-body">
					<div class="row">
						<div class="col-sm-12">
							<table class="table table-responsive-md">
								<thead>
								<tr>
									<th>Bit Number</th>
									<th>Points</th>
								</tr>
								</thead>
								<tbody id="tabledata">
								</tbody>
							</table>
						</div>
					</div>
				</div>
				<div class="modal-footer">
					<button type="button" class="btn btn-primary confirm_click">Confirm</button>
					<button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
				</div>
			</div>
		</div>
	</div>

	<script src="<?=base_url('assets/dist/js/toast.js')?>"></script>
<script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
<script>

	$(function (e){

		var options = {
			autoClose: true,
			progressBar: true,
			enableSounds: true,
			sounds: {
				info: "<?=base_url('assets/info.mp3')?>",
// path to sound for successfull message:
				success: "<?=base_url('assets/success.mp3')?>",
// path to sound for warn message:
				warning: "<?=base_url('assets/warning.mp3')?>",
// path to sound for error message:
				error: "<?=base_url('assets/error.mp3')?>",
			},
		};
		var toast = new Toasty(options);
		toast.configure(options);


		$('#load').hide();
		$('.game-bid').on('click' , function (e){

			if($(this).hasClass('bg-success')) {
				$('.game-bid').removeClass('bg-danger').addClass('bg-success');
				$(this).removeClass('bg-success').addClass('bg-danger');
				// $(this).
				// $('#game_type_bid_open'+values).prop('checked' , false);
			}
			else{
				// $('#game_type_bid_open'+values).prop('checked' , true);
				// $('#game_type_bid_open'+values).prop('checked' , false);
				// $(this).removeClass('bg-danger').addClass('bg-success');
			}
		})


		$('.bid_number').on('keyup' , function (e) {

			// var number = parseInt($(this).val() ? $(this).val() : 0 );
			var number   =   $(".bid_number").map(function(){ return $(this).val();}).get();;

			// var totals = parseInt($('#totalNumber').val() ? $('#totalNumber').val() : 0)
			var sum = 0;
			for (var i = 0; i < number.length; i++ ) {
				sum += Number(number[i]);
			}
			// console.log(sum);
			// var totalNum = (parseInt(sum) + totals);
			$('#totalNumber').val(sum);

			var secondTotal = $("#totalAmount2").val();

			var totals = Number(sum) + Number(secondTotal);

			$('#totalAmount3').val(totals);
		});

		$('.bid_number1').on('keyup' , function (e) {

			// var number = parseInt($(this).val() ? $(this).val() : 0 );
			var number   =   $(".bid_number1").map(function(){ return $(this).val();}).get();;

			var sum = 0;
			for (var i = 0; i < number.length; i++ ) {
				sum += Number(number[i]);
			}

			// var totalNum = (parseInt(sum) + totals);
			$('#totalAmount2').val(sum);

			var secondTotal = $("#totalNumber").val() ? $("#totalNumber").val() : 0 ;

			var totals = Number(sum) + Number(secondTotal);

			$('#totalAmount3').val(totals);
		});

		$('#form1').on('submit' , function (e) {
			e.preventDefault();
			var game_name   =   $("input[name='game_name']:checked").map(function(){
				return $(this).val();
			}).get();;

			if(game_name.length > 0) {
				var array = new Array();
				var number = $("input[name='txt[]']").map(function () {
					array.push($(this).val());
				}).get();
				;

				var totalNum = $('#totalAmount3').val();

				if(totalNum > 0) {

					// var bidArray = new Array();
					//
					// var bidid = $("input[name='txt[]']").map(function () {
					// 	bidArray.push($(this).data('id'));
					// }).get();
					//
					// var dataConfirm = [];
					// $.map(array, function (item, index) {
					// 	var innerObj = {};
					// 	if (item) {
					// 		innerObj['number'] = item;
					// 		innerObj['value'] = bidArray[index];
					// 		dataConfirm.push(innerObj);
					// 	}
					// })
					var form = $('#form1')[0];
					// Create an FormData object
					var data = new FormData(form);
					var values = $("input[name='game_name']:checked").data('bit_type');
					data.append('bid_types' , values);

					$.ajax({
						url: "<?= base_url('web/save_game_bid_hs')?>",
						type: "POST",
						data: data,
						dataType: 'json',
						processData: false,
						contentType: false,
						beforeSend: function () {
							$('#load').show()
						},
						success: function (result) {
							console.log(result);
							if (result.success) {
								toast.success(result.msg);
								setTimeout( function (){
									location.reload();
								}, 1000);
							} else {
								toast.error(result.msg);
							}
						},
						complete: function () {
							$('#load').hide()
						},
						error: function (jqXHR, exception) {
							$('#add-button').prop('disabled', false);
							console.log(jqXHR.responseText);
						}
					});



					// var html = '';
					// $.map(dataConfirm, function (item, index) {
					// 	html += '<tr><td>' + item.value + '</td><td>' + item.number + '</td></tr>';
					// })
					//
					// $('#tabledata').html(html);
					//
					// $('#exampleModal').modal('toggle');

					// var data = $('#form1').serializeArray().reduce(function (obj, item) {
					// 	console.log(item.name);
					// 	obj[item.name] = item.value;
					// 	return obj;
					// }, {});
				}
				else{
					toast.error('Please select a bid');
				}
			}
			else{
				toast.error('Please choose market');
			}

		})

		$('.confirm_click').on('click' , function (e){
			e.preventDefault();
			// var formData =  new FormData("#form1");
			var form = $('#form1')[0];
			// Create an FormData object
			var data = new FormData(form);
			var values = $("input[name='game_name']:checked").data('bit_type');
			data.append('bid_types' , values);

			$.ajax({
				url: "<?= base_url('web/save_game_bid_hs') ?>",
				type: "POST",
				data: data,
				dataType: 'json',
				processData: false,
				contentType: false,
				beforeSend: function () {
					$('#load').show()
				},
				success: function (result) {
					console.log(result);
					if (result.success) {
						$('#exampleModal').modal('toggle');
						toast.success(result.msg);
						setTimeout( function (){
							location.reload();
						}, 1000);
					} else {
						$('#exampleModal').modal('toggle');
						toast.error(result.msg);
					}
				},
				complete: function () {
					$('#exampleModal').modal('toggle');
					$('#load').hide()
				},
				error: function (jqXHR, exception) {
					$('#add-button').prop('disabled', false);
					console.log(jqXHR.responseText);
				}
			});
		})


	})



	//
	// function point(type)
	// {
	// 	sum=0;
	//
	// 	for(i=0; i<10; i++)
	// 	{
	// 		if(type == "l")
	// 		{
	// 			points = document.getElementById("l_" + i).value;
	// 		}else{
	// 			points = document.getElementById("r_" + i).value;
	// 		}
	// 		if(points > )
	// 		{
	// 			alert("You dont have that much point.");
	// 		}else{
	// 			sum = +sum + +points;
	// 		}
	// 		if(type == "l")
	// 		{
	// 			document.getElementById("tot1").innerHTML = sum;
	// 		}else{
	// 			document.getElementById("tot2").innerHTML = sum;
	// 		}
	// 	}
	// 	refresh();
	// }
	//
	// function refresh()
	// {
	// 	sum=0;
	//
	// 	points = document.getElementById("tot1").innerHTML;
	// 	sum = +points + +document.getElementById("tot2").innerHTML;
	//
	// 	if(sum > )
	// 	{
	// 		alert("You dont have that much point.");
	// 	}else{
	// 		document.getElementById("tot3").innerHTML = sum;
	// 	}
	// }
	//
	// function rst(tot)
	// {
	// 	document.getElementById("form1").reset();
	// 	document.getElementById("tot1").innerHTML = "00";
	// 	document.getElementById("tot2").innerHTML = "00";
	// 	document.getElementById("tot3").innerHTML = "00";
	// }

</script>
</div></td></tr> </table>
</div>
</div>

<div class="footer">&copy; 2021  sattamatkaonlineplay.com</div>
</body>
</html>
