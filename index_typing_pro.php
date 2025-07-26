<?php 
	session_start();
	error_reporting(0);
?>
<?php
	include('cookie_set.php');
	//print_r($_COOKIE['id']);
	//echo "from ".$_SESSION['from']."<br>";
	//echo "User is " . $_SESSION['Site_User'];
?>

<html>
<head>
	
	<style>
		.ex3 {
		  width: auto;
		  height: 170px;
		  overflow: hidden;
		}
		#one{
			margin:20px;
		}
		@media screen and (min-width: 601px) {
		  #one{
			font-size:40px;
		  }
		}

		@media screen and (max-width: 600px) {
		  #one{
			font-size:20px;
		  }
		}
	</style>
</head>
<body class="w3-container" onload="getting_content_for_practice(0)" id="body_tag">
	
	<!--<div class="container" >
		<canvas id="myChart" style="display:none"></canvas>
	</div>-->
	<!--<button onclick="document.getElementById('id01').style.display='block'" class="w3-button w3-black">Open Modal</button>-->
	<div id="id01" class="w3-modal w3-large" >
		<div class="w3-modal-content w3-card-4 w3-animate-zoom" style="width:1200px;height:600px">
			<div class="w3-container w3-row">
				<br>
				<span onclick="document.getElementById('id01').style.display='none'" class="w3-button w3-display-topright">&times;</span>
				<button onclick="document.getElementById('just_to_tell_user').style.display='none';document.getElementById('id01').style.display='none';drawing_stats('bar')"  class="w3-button w3-black">Bar</button>
				<button onclick="document.getElementById('just_to_tell_user').style.display='none';document.getElementById('id01').style.display='none';drawing_stats('horizontalBar')"  class="w3-button w3-black">HorizontalBar</button>
				<button onclick="document.getElementById('just_to_tell_user').style.display='none';document.getElementById('id01').style.display='none';drawing_stats('doughnut')"  class="w3-button w3-black">Ddoughnut</button>
				<button onclick="document.getElementById('just_to_tell_user').style.display='none';document.getElementById('id01').style.display='none';drawing_stats('polarArea')"  class="w3-button w3-black">PolarArea</button>
				<button onclick="document.getElementById('just_to_tell_user').style.display='none';document.getElementById('id01').style.display='none';drawing_stats('pie')"  class="w3-button w3-black">Pie</button>
				<button onclick="document.getElementById('just_to_tell_user').style.display='none';document.getElementById('id01').style.display='none';drawing_stats('radar')"  class="w3-button w3-black">Radar</button>
				<button onclick="document.getElementById('just_to_tell_user').style.display='none';document.getElementById('id01').style.display='none';drawing_stats('line')"  class="w3-button w3-black">Line</button>
				<div class="w3-container" id="just_to_tell_user" style="margin-left:440px;margin-top:120px;">
					<button class="w3-button w3-gray w3-large w3-center "  style="margin-top:60px;">Click on any of the above</button>
				</div>
				<div class=" w3-col m6"><canvas id="myChart_keystrokes" style="display:none;width:500px;height:200px" ></canvas></div>
				<div class=" w3-col m6"><canvas id="myChart_matched_strokes" style="display:none;width:500px;height:200px"></canvas></div>
			</div>
			<div class="w3-container w3-row">
				<div class=" w3-col m6"><canvas id="myChart_accuracy" style="display:none;width:500px;height:200px" ></canvas></div>
				<div class=" w3-col m6"><canvas id="myChart_word_count" style="display:none;width:500px;height:200px" ></canvas></div>
			</div>
		</div>
	</div>
	<div class="w3-container w3-margin">
		<form class="w3-panel w3-border-gray w3-sand w3-xxlarge w3-serif w3-card-4" style="height:400px;margin-left:auto;margin-right:auto" id="form_id">
			<p id="one" class="ex3" ></p>
			<br>
			<input class="w3-input w3-border" type="text" id="two" name="string_match" style="max-width:40%" onkeyup="matching_users_entered_text_to_default_texts(this.value)">				
		</form>
	</div>
	
	<div>
		<div class="w3-container w3-margin w3-padding-large">
			<div class="w3-justify">
			<p class="w3-left"><button class="w3-button w3-white w3-border w3-small" id="time_count" onclick="change_time_counter()" >60 Sec</button></p>
			<p class="w3-left"><button class="w3-button w3-black w3-border w3-small" id="graphs_after_typing" onclick="drawing_stats('line')">Graphs</button></p>
			<p class="w3-left"><button class="w3-button w3-white w3-border w3-small" onclick="document.getElementById('id02').style.display='block'" >Stats</button></p>
			<p class="w3-left"><button class="w3-button w3-black w3-border w3-small" onclick="document.getElementById('id03').style.display='block'" >Rank</button></p>
			</div>
		</div>
	</div>
	
	<div id="id02" class="w3-modal">
		<div class="w3-modal-content w3-card-4 w3-animate-zoom" style="max-width:400px">
			<div class="w3-center w3-container w3-border-top w3-padding w3-light-grey"><br>
				<p class="w3-large" >Statistics</p>
				<span onclick="document.getElementById('id02').style.display='none'" class="w3-button w3-xlarge w3-hover-red w3-display-topright" title="Close Modal">&times;</span>
			</div>
			<br>
			<div class="w3-container">
				<div class="w3-section">
					<div  id="add_stats_after_typing" class="w3-large w3-text-brown"></div>
				</div>
			</div>
			<div class="w3-container w3-border-top w3-padding-16 w3-light-grey">
				<button onclick="document.getElementById('id02').style.display='none'" type="button" class="w3-button w3-red">Cancel</button>
				<!--<span class="w3-right w3-padding w3-hide-small">Forgot <a href="#">password?</a></span>-->
			</div>
		</div>
	</div>
	
	<div id="id03" class="w3-modal">
		<div class="w3-modal-content w3-card-4 w3-animate-zoom" style="max-width:400px">
			<div class="w3-center w3-container w3-border-top w3-padding w3-light-grey"><br>
				<p class="w3-large" >Rank</p>
				<span onclick="document.getElementById('id03').style.display='none'" class="w3-button w3-xlarge w3-hover-red w3-display-topright" title="Close Modal">&times;</span>
			</div>
			<div class="w3-container">
				<div class="w3-section">
					<div  id="add_rank" class="w3-large "></div>
				</div>
			</div>
			<div class="w3-container w3-border-top w3-padding-16 w3-light-grey">
				<button onclick="document.getElementById('id03').style.display='none'" type="button" class="w3-button w3-red">Cancel</button>
				<!--<span class="w3-right w3-padding w3-hide-small">Forgot <a href="#">password?</a></span>-->
			</div>
		</div>
	</div>

	<script type="text/javascript">
	date = new Date();
	milliseconds = date.getTime();



function scrollWin(x) {
  //window.scrollTo(x, y);
	var elmnt = document.getElementById("one");
	//elmnt.scrollLeft = 50;
	//alert(x);
	elmnt.scrollTop = x;
}
		// this function is for onload stat data from database
		function getting_total_count_of_all_users_for_stats_like_key_match_acc(){
			var xmlht = new XMLHttpRequest();
			xmlht.onreadystatechange = function() {
					if (xmlht.readyState == 4 && xmlht.status == 200) {
						var new_total_count_obj = JSON.parse(xmlht.responseText);
						var y_in = document.getElementById("add_stats_after_typing");
						//y_in.innerHTML = "Total key_strokes : "+new_total_count_obj[0][0]+"<br>"+"Total Matched_strokes : " +new_total_count_obj[0][1]+"</br>"+"Accuracy : "+ (new_total_count_obj[0][1]*100)/(new_total_count_obj[0][0]) +"<br>"+ "Total Word Count : " +new_total_count_obj[0][3]+"<br>"+ "Total Time Typed(Sec) : " +new_total_count_obj[0][4]+"<br><br><br>";
						var accuracy_for_all_users = (new_total_count_obj[0][1]*100)/(new_total_count_obj[0][0]);
						var txt = "<table class='w3-table w3-centered w3-bordered w3-hoverable w3-animate-right' >";
						txt +=  	"<tr>"+
								"<td>Total key_strokes</td>"+
								"<td>"+new_total_count_obj[0][0]+"</td>"+
									"</tr>"+
									"<tr>"+
								"<td>Total Matched_strokes : </td>"+
								"<td>"+new_total_count_obj[0][1]+"</td>"+
									"</tr>"+
									"<tr>"+
								"<td>Accuracy : </td>"+
								"<td>"+accuracy_for_all_users.toFixed(2)+"</td>"+
									"</tr>"+
									"<tr>"+
								"<td>Total Word Count : </td>"+
								"<td>"+new_total_count_obj[0][3]+"</td>"+
									"</tr>"+
									"<tr>"+
								"<td>Total Time Typed(Sec) : </td>"+
								"<td>"+new_total_count_obj[0][4]+"</td>"+
									"</tr>"
						txt += "</table><br>";
						y_in.innerHTML = txt;
									
				}
			};
			xmlht.open("GET", "get_data_count_for_all_users.php", true);
			xmlht.send();	
			
		}
		// this function is for onload ranking getting data from database
		function getting_total_count_of_all_users_rank(){
			var xmlht = new XMLHttpRequest();
			xmlht.onreadystatechange = function() {
					if (xmlht.readyState == 4 && xmlht.status == 200) {
						var new_total_count_rank_obj = JSON.parse(xmlht.responseText);						
							
						var user_number_from_table = 0;
						for(row in new_total_count_rank_obj){
							var current_user = <?php echo $_SESSION['Site_User'];?>;
							if(new_total_count_rank_obj[row][0]==current_user){
								user_number_from_table = parseInt(row)+1;
								//alert("got"+user_number_from_table);
							}
						}
						
						var rank = 1;
						var txt = "<table class='w3-table w3-centered w3-bordered w3-hoverable w3-animate-left' >";
						txt += 		"<tr>"+
								"<td>Rank</td>"+
								"<td>Words</td>"+
								"<td>User</td>"+
									"</tr>"+
									"<tr class='w3-text-blue w3-hover-gray w3-large'>"+
								"<td>"+user_number_from_table+"</td>"+
								"<td>"+new_total_count_rank_obj[user_number_from_table-1][1]+"</td>"+
								"<td>"+"Your's"+"</td>"+
									"</tr>"
						for(row in new_total_count_rank_obj){
							if(row == (user_number_from_table-1)){
								rank+=1;
								continue;
							}
							if(rank>10){
								break;
							}
							txt += "<tr>"+
								"<td>"+rank+"</td>"+
								"<td>"+new_total_count_rank_obj[row][1]+"</td>"+
								"<td>"+new_total_count_rank_obj[row][0]+"</td>"+
									"</tr>"
								rank+=1;
						}
						txt += "</table>";
						
						var z_in = document.getElementById("add_rank");
						z_in.innerHTML = txt;
						//alert(new_total_count_rank_obj.length);
				}
			};
			xmlht.open("GET", "get_total_rank_of_all_users.php", true);
			xmlht.send();	
			
		}
		
		var main_string = "";
		var words_from_file = "";
		// this functions generates the list of words that are displayed in the website
		var words_generated_till_more_call_is_made_by_user_after_entering = 0;
		var first_word = 0;
		function getting_content_for_practice(required_quantity) {
			/*if(required_quantity==200){
				//alert("marquee add");
			}*/
		//function getting_content_for_practice() {
			getting_total_count_of_all_users_for_stats_like_key_match_acc();
			getting_total_count_of_all_users_rank();
			/*var xmlht = new XMLHttpRequest();
			xmlht.onreadystatechange = function() {
					if (xmlht.readyState == 4 && xmlht.status == 200) {
						words_from_file = JSON.parse(xmlht.responseText);
						//alert(words_from_file);
				}
			};
			xmlht.open("GET", "intermediate.txt", true);
			xmlht.send();	*/	
			
			var temp_x =[" The"," police"," slowly"," advanced"," across"," the"," square"," noun"," movement"," forwards"," police"," have"," made"," some"," advances"," in"," their"," fight"," against"," crime"," The"," team"," made"," an"," advance"," into"," their"," opponents'"," half"," money"," paid"," as"," a"," loan"," or"," as"," a"," part"," of"," payment"," be"," made"," later"," adjective"," done"," before"," something"," happens"," She"," made"," a"," advance"," payment"," of"," £300"," in"," advance"," earlier"," than"," the"," time"," something"," happens"," You"," must"," phone"," in"," advance"," to"," make"," an"," appointment"," They"," asked"," us"," to"," pay"," £200"," in"," advance "];
			var intermediate_words = [" ability"," able"," about"," above"," accept"," according"," account"," across"," act"," action"," activity"," actually"," add"," address"," administration"," admit"," adult"," affect"," after"," again"," against"," age"," agency"," agent"," ago"," agree"," agreement"," ahead"," air"," all"," allow"," almost"," alone"," along"," already"," also"," although"," always"," American"," among"," amount"," analysis"," and"," animal"," another"," answer"," any"," anyone"," anything"," appear"," apply"," approach"," area"," argue"," arm"," around"," arrive"," art"," article"," artist"," as"," ask"," assume"," at"," attack"," attention"," attorney"," audience"," author"," authority"," available"," avoid"," away"," baby"," back"," bad"," bag"," ball"," bank"," bar"," base"," be"," beat"," beautiful"," because"," become"," bed"," before"," begin"," behavior"," behind"," believe"," benefit"," best"," better"," between"," beyond"," big"," bill"," billion"," bit"," black"," blood"," blue"," board"," body"," book"," born"," both"," box"," boy"," break"," bring"," brother"," budget"," build"," building"," business"," but"," buy"," by"," call"," camera"," campaign"," can"," cancer"," candidate"," capital"," car"," card"," care"," career"," carry"," case"," catch"," cause"," cell"," center"," central"," century"," certain"," certainly"," chair"," challenge"," chance"," change"," character"," charge"," check"," child"," choice"," choose"," church"," citizen"," city"," civil"," claim"," class"," clear"," clearly"," close"," coach"," cold"," collection"," college"," color"," come"," commercial"," common"," community"," company"," compare"," computer"," concern"," condition"," conference"," Congress"," consider"," consumer"," contain"," continue"," control"," cost"," could"," country"," couple"," course"," court"," cover"," create"," crime"," cultural"," culture"," cup"," current"," customer"," cut"," dark"," data"," daughter"," day"," dead"," deal"," death"," debate"," decade"," decide"," decision"," deep"," defense"," degree"," Democrat"," democratic"," describe"," design"," despite"," detail"," determine"," develop"," development"," die"," difference"," different"," difficult"," dinner"," direction"," director"," discover"," discuss"," discussion"," disease"," do"," doctor"," dog"," door"," down"," draw"," dream"," drive"," drop"," drug"," during"," each"," early"," east"," easy"," eat"," economic"," economy"," edge"," education"," effect"," effort"," eight"," either"," election"," else"," employee"," end"," energy"," enjoy"," enough"," enter"," entire"," environment"," environmental"," especially"," establish"," even"," evening"," event"," ever"," every"," everybody"," everyone"," everything"," evidence"," exactly"," example"," executive"," exist"," expect"," experience"," expert"," explain"," eye"," face"," fact"," factor"," fail"," fall"," family"," far"," fast"," father"," fear"," federal"," feel"," feeling"," few"," field"," fight"," figure"," fill"," film"," final"," finally"," financial"," find"," fine"," finger"," finish"," fire"," firm"," first"," fish"," five"," floor"," fly"," focus"," follow"," food"," foot"," for"," force"," foreign"," forget"," form"," former"," forward"," four"," free"," friend"," from"," front"," full"," fund"," future"," game"," garden"," gas"," general"," generation"," get"," girl"," give"," glass"," go"," goal"," good"," government"," great"," green"," ground"," group"," grow"," growth"," guess"," gun"," guy"," hair"," half"," hand"," hang"," happen"," happy"," hard"," have"," he"," head"," health"," hear"," heart"," heat"," heavy"," help"," her"," here"," herself"," high"," him"," himself"," his"," history"," hit"," hold"," home"," hope"," hospital"," hot"," hotel"," hour"," house"," how"," however"," huge"," human"," hundred"," husband"," I"," idea"," identify"," if"," image"," imagine"," impact"," important"," improve"," in"," include"," including"," increase"," indeed"," indicate"," individual"," industry"," information"," inside"," instead"," institution"," interest"," interesting"," international"," interview"," into"," investment"," involve"," issue"," it"," item"," its"," itself"," job"," join"," just"," keep"," key"," kid"," kill"," kind"," kitchen"," know"," knowledge"," land"," language"," large"," last"," late"," later"," laugh"," law"," lawyer"," lay"," lead"," leader"," learn"," least"," leave"," left"," leg"," legal"," less"," let"," letter"," level"," lie"," life"," light"," like"," likely"," line"," list"," listen"," little"," live"," local"," long"," look"," lose"," loss"," lot"," love"," low"," machine"," magazine"," main"," maintain"," major"," majority"," make"," man"," manage"," management"," manager"," many"," market"," marriage"," material"," matter"," may"," maybe"," me"," mean"," measure"," media"," medical"," meet"," meeting"," member"," memory"," mention"," message"," method"," middle"," might"," military"," million"," mind"," minute"," miss"," mission"," model"," modern"," moment"," money"," month"," more"," morning"," most"," mother"," mouth"," move"," movement"," movie"," Mr"," Mrs"," much"," music"," must"," my"," myself"," name"," nation"," national"," natural"," nature"," near"," nearly"," necessary"," need"," network"," never"," new"," news"," newspaper"," next"," nice"," night"," no"," none"," nor"," north"," not"," note"," nothing"," notice"," now"," n't"," number"," occur"," of"," off"," offer"," office"," officer"," official"," often"," oh"," oil"," ok"," old"," on"," once"," one"," only"," onto"," open"," operation"," opportunity"," option"," or"," order"," organization"," other"," others"," our"," out"," outside"," over"," own"," owner"," page"," pain"," painting"," paper"," parent"," part"," participant"," particular"," particularly"," partner"," party"," pass"," past"," patient"," pattern"," pay"," peace"," people"," per"," perform"," performance"," perhaps"," period"," person"," personal"," phone"," physical"," pick"," picture"," piece"," place"," plan"," plant"," play"," player"," PM"," point"," police"," policy"," political"," politics"," poor"," popular"," population"," position"," positive"," possible"," power"," practice"," prepare"," present"," president"," pressure"," pretty"," prevent"," price"," private"," probably"," problem"," process"," produce"," product"," production"," professional"," professor"," program"," project"," property"," protect"," prove"," provide"," public"," pull"," purpose"," push"," put"," quality"," question"," quickly"," quite"," race"," radio"," raise"," range"," rate"," rather"," reach"," read"," ready"," real"," reality"," realize"," really"," reason"," receive"," recent"," recently"," recognize"," record"," red"," reduce"," reflect"," region"," relate"," relationship"," religious"," remain"," remember"," remove"," report"," represent"," Republican"," require"," research"," resource"," respond"," response"," responsibility"," rest"," result"," return"," reveal"," rich"," right"," rise"," risk"," road"," rock"," role"," room"," rule"," run"," safe"," same"," save"," say"," scene"," school"," science"," scientist"," score"," sea"," season"," seat"," second"," section"," security"," see"," seek"," seem"," sell"," send"," senior"," sense"," series"," serious"," serve"," service"," set"," seven"," several"," sex"," sexual"," shake"," share"," she"," shoot"," short"," shot"," should"," shoulder"," show"," side"," sign"," significant"," similar"," simple"," simply"," since"," sing"," single"," sister"," sit"," site"," situation"," six"," sizeill"," skin"," small"," smile"," so"," social"," society"," soldier"," some"," somebody"," someone"," something"," sometimes"," son"," song"," soon"," sort"," sound"," source"," south"," southern"," space"," speak"," special"," specific"," speech"," spend"," sport"," spring"," staff"," stage"," stand"," standard"," star"," start"," state"," statement"," station"," stay"," step"," still"," stock"," stop"," store"," story"," strategy"," street"," strong"," structure"," student"," study"," stuff"," style"," subject"," success"," successful"," such"," suddenly"," suffer"," suggest"," summer"," support"," sure"," surface"," system"," table"," take"," talk"," task"," tax"," teach"," teacher"," team"," technology"," television"," tell"," ten"," tend"," term"," test"," than"," thank"," that"," the"," their"," them"," themselves"," then"," theory"," there"," these"," they"," thing"," think"," third"," this"," those"," though"," thought"," thousand"," threat"," three"," through"," throughout"," throw"," thus"," time"," to"," today"," together"," tonight"," too"," top"," total"," tough"," toward"," town"," trade"," traditional"," training"," travel"," treat"," treatment"," tree"," trial"," trip"," trouble"," true"," truth"," try"," turn"," TV"," two"," type"," under"," understand"," unit"," until"," up"," upon"," us"," use"," usually"," value"," various"," very"," victim"," view"," violence"," visit"," voice"," vote"," wait"," walk"," wall"," want"," war"," watch"," water"," way"," we"," weapon"," wear"," week"," weight"," well"," west"," western"," what"," whatever"," when"," where"," whether"," which"," while"," white"," who"," whole"," whom"," whose"," why"," wide"," wife"," will"," win"," wind"," window"," wish"," with"," within"," without"," woman"," wonder"," word"," work"," worker"," world"," worry"," would"," write"," writer"," wrong"," yard"," yeah"," year"," yes"," yet"," you"," young"," your"," yourself "];
			var x = [" ability"," able"," about"," above"," accept"," according"," account"," HE"," VITAMINS"," ARE"," IN"," MY"," FRESH"," CALIFORNIA"," RAISINS"," the"," Quick"," Brown"," FoxJumpsOver"," TheLazyDog"," He"," Vitamin"," Are"," In"," My"," Fresh"," California"," Raisins"," across"," act"," action"," activity"," actually"," add"," address"," administration"," admit"," adult"," affect"," after"," again"," against"," age"," agency"," agent"," ago"," agree"," agreement"," ahead"," air"," all"," allow"," almost"," alone"," along"," already"," also"," although"," always"," American"," among"," amount"," analysis"," and"," animal"," another"," answer"," any"," anyone"," anything"," appear"," apply"," approach"," area"," argue"," arm"," around"," arrive"," art"," article"," artist"," as"," ask"," assume"," at"," attack"," attention"," attorney"," audience"," author"," authority"," available"," avoid"," away"," baby"," back"," bad"," bag"," ball"," bank"," bar"," base"," be"," beat"," beautiful"," because"," become"," bed"," before"," begin"," behavior"," behind"," believe"," benefit"," best"," better"," between"," beyond"," big"," bill"," billion"," bit"," black"," blood"," blue"," board"," body"," book"," born"," both"," box"," boy"," break"," bring"," brother"," budget"," build"," building"," business"," but"," buy"," by"," call"," camera"," campaign"," can"," cancer"," candidate"," capital"," car"," card"," care"," career"," carry"," case"," catch"," cause"," cell"," center"," central"," century"," certain"," certainly"," chair"," challenge"," chance"," change"," character"," charge"," check"," child"," choice"," choose"," church"," citizen"," city"," civil"," claim"," class"," clear"," clearly"," HE"," VITAMINS"," ARE"," IN"," MY"," FRESH"," CALIFORNIA"," RAISINS"," He"," Vitamin"," Are"," In"," My"," Fresh"," California"," Raisins"," close"," coach"," cold"," collection"," college"," color"," come"," commercial"," common"," community"," company"," compare"," computer"," concern"," condition"," conference"," Congress"," consider"," consumer"," contain"," continue"," control"," cost"," could"," country"," couple"," course"," court"," cover"," create"," crime"," cultural"," culture"," cup"," current"," customer"," cut"," dark"," data"," daughter"," day"," dead"," deal"," death"," debate"," decade"," decide"," decision"," deep"," defense"," degree"," Democrat"," democratic"," HE"," VITAMINS"," ARE"," IN"," MY"," FRESH"," CALIFORNIA"," RAISINS"," He"," Vitamin"," Are"," In"," My"," Fresh"," California"," Raisins"," describe"," design"," despite"," detail"," determine"," develop"," development"," die"," difference"," different"," HE"," VITAMINS"," ARE"," IN"," MY"," FRESH"," CALIFORNIA"," RAISINS"," He"," Vitamin"," Are"," In"," My"," Fresh"," California"," Raisins"," difficult"," dinner"," direction"," director"," ThisIsATest"," discover"," discuss"," discussion"," disease"," do"," doctor"," dog"," door"," down"," draw"," dream"," drive"," drop"," drug"," during"," each"," early"," east"," easy"," eat"," economic"," economy"," edge"," education"," effect"," effort"," eight"," either"," election"," else"," employee"," end"," energy"," enjoy"," enough"," enter"," entire"," environment"," environmental"," especially"," establish"," even"," evening"," event"," ever"," every"," everybody"," everyone"," everything"," evidence"," exactly"," example"," executive"," exist"," expect"," experience"," expert"," explain"," eye"," face"," fact"," factor"," fail"," fall"," family"," far"," fast"," father"," fear"," federal"," feel"," feeling"," few"," field"," fight"," figure"," fill"," film"," final"," finally"," financial"," find"," fine"," finger"," finish"," fire"," firm"," first"," fish"," five"," floor"," fly"," focus"," follow"," food"," foot"," for"," force"," foreign"," forget"," form"," former"," forward"," four"," free"," friend"," from"," front"," full"," fund"," future"," game"," garden"," gas"," general"," generation"," get"," girl"," give"," glass"," go"," goal"," good"," government"," great"," green"," ground"," group"," grow"," growth"," guess"," gun"," guy"," hair"," half"," hand"," hang"," happen"," happy"," hard"," have"," he"," head"," health"," hear"," heart"," heat"," heavy"," help"," her"," here"," herself"," high"," him"," himself"," his"," history"," hit"," hold"," home"," hope"," hospital"," hot"," hotel"," hour"," house"," how"," however"," huge"," human"," hundred"," husband"," I"," idea"," identify"," if"," image"," imagine"," impact"," important"," improve"," in"," include"," including"," increase"," indeed"," indicate"," individual"," industry"," information"," inside"," instead"," institution"," interest"," interesting"," international"," interview"," into"," investment"," involve"," issue"," it"," item"," its"," itself"," job"," join"," just"," keep"," key"," kid"," kill"," kind"," kitchen"," know"," knowledge"," land"," language"," large"," last"," late"," later"," laugh"," law"," lawyer"," lay"," lead"," leader"," learn"," least"," leave"," left"," leg"," legal"," less"," let"," letter"," level"," lie"," life"," light"," like"," likely"," line"," list"," listen"," little"," live"," local"," long"," look"," lose"," loss"," lot"," love"," low"," machine"," magazine"," main"," maintain"," major"," majority"," make"," man"," manage"," management"," manager"," many"," market"," marriage"," material"," matter"," may"," maybe"," me"," mean"," measure"," media"," medical"," meet"," meeting"," member"," memory"," mention"," message"," method"," middle"," might"," military"," million"," mind"," minute"," miss"," mission"," model"," modern"," moment"," money"," month"," more"," morning"," most"," mother"," mouth"," move"," movement"," movie"," Mr"," Mrs"," much"," music"," must"," my"," myself"," name"," nation"," national"," natural"," nature"," near"," nearly"," necessary"," need"," network"," never"," new"," news"," newspaper"," next"," nice"," night"," no"," none"," nor"," north"," not"," note"," nothing"," notice"," now"," n't"," number"," occur"," of"," off"," offer"," office"," officer"," official"," often"," oh"," oil"," ok"," old"," on"," once"," one"," only"," the"," Quick"," Brown"," FoxJumpsOver"," TheLazyDog"," onto"," open"," operation"," opportunity"," option"," or"," order"," organization"," other"," others"," our"," out"," outside"," over"," own"," owner"," page"," pain"," painting"," paper"," parent"," part"," participant"," particular"," particularly"," partner"," party"," pass"," past"," patient"," pattern"," pay"," peace"," people"," per"," perform"," performance"," perhaps"," period"," person"," personal"," phone"," physical"," pick"," picture"," piece"," place"," plan"," plant"," play"," player"," PM"," point"," police"," policy"," political"," politics"," poor"," popular"," population"," position"," positive"," possible"," power"," practice"," prepare"," present"," president"," pressure"," pretty"," prevent"," price"," private"," probably"," problem"," process"," produce"," product"," production"," professional"," professor"," program"," project"," property"," protect"," prove"," provide"," public"," pull"," purpose"," push"," put"," quality"," question"," quickly"," quite"," race"," radio"," raise"," range"," rate"," rather"," reach"," read"," ready"," real"," reality"," realize"," really"," reason"," receive"," recent"," recently"," recognize"," record"," red"," reduce"," reflect"," region"," relate"," relationship"," religious"," remain"," remember"," remove"," report"," represent"," Republican"," require"," research"," resource"," respond"," response"," responsibility"," rest"," result"," return"," reveal"," rich"," right"," rise"," risk"," road"," rock"," role"," room"," rule"," run"," safe"," same"," save"," say"," scene"," school"," science"," scientist"," score"," sea"," season"," seat"," second"," section"," security"," see"," seek"," seem"," sell"," send"," senior"," sense"," series"," serious"," serve"," service"," set"," seven"," several"," sex"," sexual"," shake"," share"," she"," shoot"," short"," shot"," should"," shoulder"," show"," side"," sign"," significant"," similar"," simple"," simply"," since"," sing"," single"," sister"," sit"," site"," situation"," six"," sizeill"," skin"," small"," smile"," so"," social"," society"," soldier"," some"," somebody"," someone"," something"," sometimes"," son"," song"," soon"," sort"," sound"," source"," south"," southern"," space"," the"," Quick"," Brown"," FoxJumpsOver"," TheLazyDog"," speak"," special"," specific"," speech"," spend"," sport"," spring"," staff"," stage"," stand"," standard"," star"," start"," state"," statement"," station"," stay"," step"," still"," stock"," stop"," store"," story"," strategy"," street"," strong"," structure"," student"," study"," stuff"," style"," subject"," success"," successful"," such"," suddenly"," suffer"," suggest"," summer"," support"," sure"," surface"," system"," table"," take"," talk"," task"," tax"," teach"," teacher"," team"," technology"," television"," tell"," ten"," tend"," term"," test"," than"," thank"," that"," the"," the"," Quick"," Brown"," FoxJumpsOver"," TheLazyDog"," their"," them"," themselves"," then"," theory"," there"," these"," they"," thing"," think"," third"," this"," those"," though"," thought"," thousand"," threat"," three"," through"," throughout"," throw"," thus"," time"," to"," today"," together"," tonight"," too"," top"," total"," tough"," toward"," town"," trade"," traditional"," training"," travel"," treat"," treatment"," tree"," trial"," trip"," trouble"," true"," truth"," try"," turn"," TV"," two"," type"," under"," understand"," unit"," until"," up"," upon"," us"," use"," usually"," value"," various"," very"," victim"," view"," violence"," visit"," voice"," vote"," wait"," walk"," wall"," want"," war"," watch"," water"," way"," we"," weapon"," wear"," week"," weight"," well"," west"," western"," what"," whatever"," when"," where"," whether"," which"," while"," white"," who"," whole"," whom"," whose"," why"," wide"," wife"," will"," win"," wind"," window"," wish"," with"," within"," without"," woman"," wonder"," word"," work"," worker"," world"," worry"," would"," write"," writer"," wrong"," yard"," yeah"," year"," yes"," yet"," you"," young"," your"," yourself "];
			// ["abhi"," shek"," mash"," etty"," given"," PES_uni"," how"," are"," people "];
			var y = x.length;
			var z = document.getElementById("one");
			
			var random_index = 0;
			
			var characters_genearated_for_output_from_data_set = 0;
			while(characters_genearated_for_output_from_data_set<(200+required_quantity)){
			//while(characters_genearated_for_output_from_data_set<(200)){
				if(first_word==0){
					random_index = Math.floor(Math.random() * 998);
					z.innerHTML= z.innerHTML+x[random_index].split(" ")[1];	
					main_string = main_string+x[random_index].split(" ")[1];
					first_word = 1;
					characters_genearated_for_output_from_data_set = main_string.length;
					words_generated_till_more_call_is_made_by_user_after_entering +=1;
				}				
				random_index = Math.floor(Math.random() * 998);
				z.innerHTML= z.innerHTML+x[random_index];	
				main_string = main_string+x[random_index];
				characters_genearated_for_output_from_data_set = main_string.length;
				words_generated_till_more_call_is_made_by_user_after_entering +=1;
				//checking_height = document.getElementById("one");
				//positionInfo = checking_height.getBoundingClientRect();
				//height = positionInfo.height;
				//width = positionInfo.width;
			}
			// this part is adding an extra space at the end of last word
			z.innerHTML= z.innerHTML+" ";	
			main_string = main_string+" ";
			//alert("no of chara"+characters_genearated_for_output_from_data_set);
			//z.innerHTML = main_string;
			//z.innerHTML = "<marquee behavior='slide' direction='up'>"+main_string+"</marquee>";	
			//alert(words_generated_till_more_call_is_made_by_user_after_entering);
		}
		
		var k = 0;  // this is to check the spaces/words that the user has entered

		var first_letter = 0; // this is for checking if the user has started entering letter
		var key_strokes = 0;  // this is to count the number of key strokes entered by the user
		var match_strokes = 0;  // this is to count the number of matched key stroked entered by the user
		var words_count = 0;
		// this function is to check if the user entered letter matches with the original letter
		var myVar = "";
		var words_correct_and_wrong = 0;
		var extra_characters_required = 0;
		var scroll_count = 0;
		function matching_users_entered_text_to_default_texts(str){
			if(words_generated_till_more_call_is_made_by_user_after_entering-words_correct_and_wrong < 5 ){
				first_word = 0;
				var okay = "no";
				extra_characters_required += 100;
				getting_content_for_practice(extra_characters_required);
				scroll_count += 110;
				scrollWin(scroll_count);
			}
		
			if(first_letter==0){
				first_letter = 1;
				myVar = setInterval(timer, 1000);
			}
			key_strokes =key_strokes+1;
			var flag = 0;
			//var lb1 = document.createElement("div");
			//	lb1.setAttribute("id","checking");
			
			var color = document.getElementById("one");

			var q = document.getElementById("one").innerHTML;
			var p = str;
			var le = p.length;
			if(le==0){
				//color.innerHTML = main_string.slice(0);
				color.innerHTML = "<span style=\"background-color:Green\">" + main_string.slice(0,k)+ "</span>" + "<span style=\"color:black\">"   +main_string.slice(k) + "</span>" ;
			}	
			for(i=0;i<le;i++){
					if(p.charAt(i)==main_string.charAt(i+k) && flag!=1){
						if(i==le-1){
							match_strokes+=1;	
						}
						if(p.charAt(i)== " " && main_string.charAt(i+k)== " "){
							k = i+k+1;
							var clearing_client = document.getElementById('two');
							clearing_client.value = "";
							words_count +=1;
							words_correct_and_wrong +=1;
						}
						color.innerHTML = "<span style=\"background-color:Green\">" + main_string.slice(0,k)+ "</span>" + "<span style=\"color:black\">"   +main_string.slice(k) + "</span>" ;
					}else{
						var j = k+1;
						for(j = k; j<main_string.length;j++){
							if(main_string.charAt(j)==" "){
								break;
							}
						}
							color.innerHTML = "<span style=\"background-color:Green\">" + main_string.slice(0,k)+ "</span>" + "<span style=\"background-color:RED\">"   +main_string.slice(k,j) + "</span>" + main_string.slice(j);
							flag = 1;
							if(p.charAt(i)==" "){
								var clearing_client = document.getElementById('two');
								clearing_client.value = "";
								k = j+1;	
								words_correct_and_wrong +=1;
							}
					}	
				}
//			var q_add = document.getElementById("form_id");
//			q_add.appendChild(lb1);
		}

		// this function is to output the result of the practice above
		function function_accuracy_measure(){
			//var x = document.getElementById("time_count");
			//x.innerHTML = "key_strokes "+key_strokes+" Matched_strokes "+match_strokes+"</br>"+"Accuracy "+ match_strokes*100/key_strokes + "word count" +words_count;
			document.getElementById('two').readOnly = true;
			//call backend pages here to store the data and compare previous and present data to render graph
			
			var y = document.getElementById('add_stats_after_typing');
			//y.innerHTML = "key_strokes : "+key_strokes+"<br>"+"Matched_strokes : " +match_strokes+"</br>"+"Accuracy : "+ match_strokes*100/key_strokes +"<br>"+ "word count : " +words_count+"<br><br><br>";
								
			var accuracy_for_user = (match_strokes*100)/key_strokes;
			var txt = "<table class='w3-table w3-centered w3-bordered w3-hoverable w3-animate-left' >";
			txt +=  	"<tr>"+
					"<td>Total key_strokes</td>"+
					"<td>"+key_strokes+"</td>"+
						"</tr>"+
						"<tr>"+
					"<td>Total Matched_strokes : </td>"+
					"<td>"+match_strokes+"</td>"+
						"</tr>"+
						"<tr>"+
					"<td>Accuracy : </td>"+
					"<td>"+accuracy_for_user.toFixed(2)+"</td>"+
						"</tr>"+
						"<tr>"+
					"<td>Total Word Count : </td>"+
					"<td>"+words_count+"</td>"+
						"</tr>"+
						"<tr>"
			txt += "</table><br>";
			y.innerHTML = txt;			
			document.getElementById('id02').style.display='block';
			
			var accuracy = match_strokes*100/key_strokes;
			put_data_into_database(key_strokes,match_strokes,accuracy,words_count,time_user_is_typing);
			
		}
		var myObj = "";
		function put_data_into_database(int_1,int_2,int_3,int_4,int_5) {
			var xmlhttp = new XMLHttpRequest();
			xmlhttp.onreadystatechange = function() {
					if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
						myObj = JSON.parse(xmlhttp.responseText);
						/*var txt = "<table border='1'>";
						
						for(row in myObj){
							txt += "<tr>"+
								"<td>"+myObj[row][0]+"</td>"+
								"<td>"+myObj[row][1]+"</td>"+
								"<td>"+myObj[row][2]+"</td>"+
								"<td>"+myObj[row][3]+"</td>"+
								"<td>"+myObj[row][4]+"</td>"+
									"</tr>"
						}
						txt += "</table>";
						
						document.getElementById("demo").innerHTML = txt;*/
						//alert(myObj.length);
						//drawing_stats('line');
						
				}
			};
			xmlhttp.open("GET", "getdata.php?q=" + int_1+"&r=" + int_2+"&s=" + int_3+"&t=" + int_4+"&u=" + int_5, true);
			xmlhttp.send(null);			
		}
		
		var time_to_type = 60;
		var time_user_is_typing = 60;
		function timer(){
			document.getElementById("time_count").innerHTML = time_to_type-- + " Sec ";
			document.getElementById('time_count').setAttribute("onclick","goingnowhere()");
			// this function is to disable click on the timie button 
			function goingnowhere(){}
			
			if(time_to_type == -1){
				clearInterval(myVar);
				var clearing_any_fast_typed_character_remaining = document.getElementById('two');
				clearing_any_fast_typed_character_remaining.value = "";
				document.getElementById('time_count').setAttribute("onclick","change_time_counter()");
				function_accuracy_measure();
				return;
			}
		}
		
		function change_time_counter(){
			var typing_box_availability = 0;
			var out = document.getElementById("time_count");
			var person = prompt("Enter Time duration in Sec");
			var count = 0;
			while(count<2 && person !=null && person != ""){
				if(person >120 || person < 10 || person != parseInt(person)){
						//alert("if");
						var person = prompt("Enter Time duration in Sec,Max-Limit:120,Min-Limit:10");
						if(count==1 && person <= 120 && person > 10){
							out.innerHTML = person+" Sec";
							time_to_type = person;
							typing_box_availability = 1;
							break;
						}
				}else{
					out.innerHTML = person+" Sec";
					time_to_type = person;
					typing_box_availability = 1;
					//alert("else");
					break;
				}
				count+=1;
				
			}
			if(count==2 ){
				out.innerHTML = 60+" Sec";
				time_to_type = 60;
				typing_box_availability = 1;
				alert('3');
			}
			if(typing_box_availability == 1){
				document.getElementById('two').readOnly = false;
				first_letter = 0;
				first_word = 0;
				var clearing_for_next_session = document.getElementById('one');
				clearing_for_next_session.innerHTML = "";
				main_string = "";
				k = 0;  // this is to check the spaces/words that the user has entered
				first_letter = 0; // this is for checking if the user has started entering letter
				key_strokes = 0;  // this is to count the number of key strokes entered by the user
				match_strokes = 0;  // this is to count the number of matched key stroked entered by the user
				words_count = 0;
				extra_characters_required = 0;
				words_correct_and_wrong = 0;
			// this function is to check if the user entered letter matches with the original letter
				myVar = "";
				//alert("geting200_okay");
				//getting_content_for_practice(200);
				words_generated_till_more_call_is_made_by_user_after_entering = 0;
				scroll_count = 0;
				getting_content_for_practice(0);
			}
			
			time_user_is_typing = time_to_type;
			
		}
		//var myVar = "";
		//if(first_letter==1){
			//myVar = setInterval(timer, 1000);
		//}
		var fullDatamyObj = "";
		var user_has_not_yet_started_typing = 0;
		var massPopChart = "";
		var done_all_four_charts_for_one_graph = 0;
		function drawing_stats(drawing_method){
			if(done_all_four_charts_for_one_graph == 1){
					//alert("here in if");
					massPopChart.destroy();
			}
			function data_extraction_based_on_paramter(arg){							
			
				function get_all_data_of_all_users_from_database(parameter) {
					var xmlhttp = new XMLHttpRequest();
					xmlhttp.onreadystatechange = function() {
							if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
								fullDatamyObj = JSON.parse(xmlhttp.responseText);
								//alert("xmlhttp"+fullDatamyObj.length);
						}
					};
					xmlhttp.open("GET", "getdataofallusers.php?q=" + parameter, true);
					xmlhttp.send(null);			
				}
				//alert("length of myobj"+myObj.length);
				if(myObj.length==0){										
					if(user_has_not_yet_started_typing==0){						
						get_all_data_of_all_users_from_database(arg);
						user_has_not_yet_started_typing = 1;
						//alert("if"+fullDatamyObj.length);
					}					
					label_field = [];
					data_for_graph = [];
					//alert("Heretypinh"+fullDatamyObj.length);
					for(i = (fullDatamyObj.length)-10; i < fullDatamyObj.length;i++){
						//alert(myObj);
						label_field.push(fullDatamyObj[i][4]);						
						data_for_graph.push(fullDatamyObj[i][arg]);
					}
					document.getElementById('just_to_tell_user').style.display='none';
				}
				else{
					document.getElementById('just_to_tell_user').style.display='none';
					label_field = [];
					data_for_graph = [];
					for(i = (myObj.length)-10; i < myObj.length;i++){
						//alert(myObj);
						label_field.push(myObj[i][4]);
						data_for_graph.push(myObj[i][arg]);
					}
				}
				/*label_field = [];
				data_for_graph = [];
				for(i = (myObj.length)-10; i < myObj.length;i++){
					alert(myObj);
					label_field.push(i);
					data_for_graph.push(myObj[i][arg]);
				}*/
			}
			function clearing_already_generated_canvas(){
				myChart_keystrokes.clearRect(0, 0, 500,200);
				myChart_matched_strokes.clearRect(0, 0, 500,200);
				myChart_accuracy.clearRect(0, 0, 500,200);
				myChart_word_count.clearRect(0, 0, 500,200);
			}
			
			document.getElementById('id01').style.display='block';
			var myChart_keystrokes = document.getElementById('myChart_keystrokes').getContext('2d');
			document.getElementById('myChart_keystrokes').style.display="block";
			data_extraction_based_on_paramter(0);
			areas_served(myChart_keystrokes,'Keystrokes');

			
			var myChart_matched_strokes = document.getElementById('myChart_matched_strokes').getContext('2d');
			document.getElementById('myChart_matched_strokes').style.display="block";
			data_extraction_based_on_paramter(1);
			areas_served(myChart_matched_strokes,'Matched Keystrokes');
			
			var myChart_accuracy = document.getElementById('myChart_accuracy').getContext('2d');
			document.getElementById('myChart_accuracy').style.display="block";
			data_extraction_based_on_paramter(2);
			areas_served(myChart_accuracy,'Accuracy');
			
			var myChart_word_count = document.getElementById('myChart_word_count').getContext('2d');
			document.getElementById('myChart_word_count').style.display="block";
			data_extraction_based_on_paramter(3);
			areas_served(myChart_word_count,'Word Count');
			
			done_all_four_charts_for_one_graph = 1;
			
			// Global Options
			Chart.defaults.global.defaultFontFamily = 'Lato';
			Chart.defaults.global.defaultFontSize = 18;
			Chart.defaults.global.defaultFontColor = '#777';
			function areas_served(loc_area,text_area){
				//massPopChart.destroy();
				  massPopChart = new Chart(loc_area, {
				  type:drawing_method, // bar, horizontalBar, pie, line, doughnut, radar, polarArea  
				  data:{
					labels:label_field,
					datasets:[{
					  label:'Population',
					  data:data_for_graph,
					  /*data:[
						myObj[0][0],myObj[1][0],myObj[2][0],myObj[3][0],
						myObj[4][0],myObj[5][0],myObj[6][0],myObj[7][0],
						myObj[8][0],myObj[9][0],myObj[10][0],myObj[11][0],
						myObj[12][0],myObj[13][0],myObj[14][0],myObj[15][0],
						myObj[16][0],myObj[17][0],myObj[18][0],myObj[19][0],
						617594,
						181045,
						153060,
						106519,
						105162,
						95072 
						
					  ]*/
					  //backgroundColor:'green',
					  backgroundColor:[
						'rgba(255, 99, 132, 0.6)',
						'rgba(54, 162, 235, 0.6)',
						'rgba(255, 206, 86, 0.6)',
						'rgba(75, 192, 192, 0.6)',
						'rgba(153, 102, 255, 0.6)',
						'rgba(255, 159, 64, 0.6)',
						'rgba(255, 99, 132, 0.6)',
						'rgba(255, 99, 132, 0.6)',
						'rgba(255, 206, 86, 0.6)',
						'rgba(75, 192, 192, 0.6)',
						'rgba(54, 162, 235, 0.6)'
					  ],
					  borderWidth:1,
					  borderColor:'#777',
					  hoverBorderWidth:3,
					  hoverBorderColor:'#000'
					}]
				  },
				  options:{
					title:{
					  display:true,
					  //text:'Largest Cities In Massachusetts',
					  text:text_area,
					  fontSize:25
					},
					legend:{
					  display:true,
					  position:'right',
					  labels:{
						fontColor:'#000'
					  }
					},
					layout:{
					  padding:{
						left:50,
						right:0,
						bottom:0,
						top:0
					  }
					},
					tooltips:{
					  enabled:true
					}
				  }
				});
			}
		}	
	</script>

	
</body>
</html>

