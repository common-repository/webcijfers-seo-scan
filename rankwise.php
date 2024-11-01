<?php
/*
 * Plugin Name: RankWise SEO 
 * URI: http://www.rankwise.net/
 * Description: Complete SEO Scan
 * Version: 2.1.12 
 * Author: RankWise
 * Author URI: https://www.rankwise.net/ 
 * License: Public Domain
 */

wp_enqueue_script ( "jquery" );
add_action ( 'add_meta_boxes', 'cd_meta_box_add' );
add_action('admin_menu', 'register_custom_menu_page');

function change_rwc(){
	update_option('rwc', $_POST['v']);
}



if (get_option ( 'rwc' )) {
	add_action ( 'genesis_footer', 'rankwise_credits' );
	add_action ( 'twentyten_credits', 'rankwise_credits' );
	add_action ( 'twentythirteen_credits', 'rankwise_credits' );
}
function rankwise_credits() {
	echo '<a style="display:inline" href="http://www.rankwise.net">RankWise Optimized</a>';
}



function register_custom_menu_page() {
    add_menu_page('Rankwise SEO', 'Rankwise SEO', 'add_users', 'rankwisemenu', '_custom_menu_page', null, 46); 
}

function _custom_menu_page(){?>
<?php echo style()?>

   <h2>Rankwise SEO SCan</h2>
   <div id="seoscan">
   </div>
   <script>
	jQuery(document).ready(function($){
		var sUrl = '<?php echo get_site_url(); ?>'; 
			$('#seoscan').html('<img width="60" src="<?php echo plugin_dir_url( __FILE__ ) . '/loader.gif'?>"> scanning .. one moment please.');
			$.ajax({
			     url:"http://www.rankwise.net/seoexternal/scan",
			     dataType: 'jsonp',
			     data:{'sUrl':sUrl},
			     success:function(json){
			    	 if(json.error){
			    		 $('#seoscan').html(json.error);
			    	 } else {
			    		var html = json.response;
				        $('#seoscan').html(html);
				        secondscan(sUrl);
			    	 }
			     },
			     error:function(e){
			    	 $('#seoscan').html('<h2>There was no repsonse from the RankWise API .... try  again please</h2>');
			     },
			});



		function secondscan(sUrl){
			console.log('hier');
			$('.tdImg').each(function() {
				$(this).html('<img style="max-height:50px;max-width:50px;" src="' + $(this).attr("rel") + '">');
			});
			
			$('img').error(function() {
				$(this).remove();
			});
			
			
			$("#internallinks a").removeAttr("href");
			
			$.ajax({
			     url:"http://www.rankwise.net/seo-scan/ajaxscan",
			     dataType: 'jsonp',
			     data:{'url':sUrl},
			     success:function(json){
			    	 
			    	 
			    		$('#fbshare').html(json.fbshare);
			    		$('#fblike').html(json.fblike);
			    		$('#fbcomments').html(json.fbcomments);
			    		$('#twittercount').html(json.twittercount);
			    		$('#plus1count').html(json.plus1count);
			    		
			    		$('#custom404').html(json.custom404);
			    		if(json.subdomainredirecturl){
			    		$('#subdomainredirecturl').html(json.subdomainredirecturl);
			    		} else{
			    			$('#subdomainredirecturl').html('No correct redirect detected');
			    				}
			    		
			    		$('#robotstxt').html(json.robotstxt);
			    		$('#favicon').html(json.favicon);
			    		if(json.aSiteMaps){
			    			$('#asitemaps').html('');
			    			for (var i = 0; i < json.aSiteMaps.length; i++) {
			    				$('#asitemaps').append(json.aSiteMaps[i]+'<br />');
			    			}
			    		} else{
			    			$('#asitemaps').html('no');
			    		}
			     },
			     error:function(e){
			     }
			});
			

		}


		var webcijferstimer;

		$(document).on("click", ".help", function(e) {
			var text = $(this).data('help');
			clearTimeout(webcijferstimer);
			webcijferstimer = setTimeout(function() {
				if ($('#hint').length == 0) {
					$('body').append('<div id="hint" style="position: absolute;	background-color: #fff;	padding: 10px;-webkit-box-shadow: 5px 5px 15px 6px rgba(0, 0, 0, .2);box-shadow: 5px 5px 15px 6px rgba(0, 0, 0, .2);width: auto;max-width: 300px;text-align: left;max-width: 300px;" class="tip" onclick="$(this).remove();"></div>');
				}
				$('#hint').text(text);

				var a = $('#hint').height() + 40;
				var b = $('#hint').width() / 2;
				$('#hint').css('top', e.pageY - a);
				$('#hint').css('left', e.pageX - b);

			}, 200);
		});
	
	});

	
	
	</script>
<?php }

function style(){
	return '<style>
#seoscan h2{margin:20px 0 0 0;color:#21759B;}
#seoscan h3{margin:10px 0 0 0;color:#4b1caf;border-bottom:1px solid #fff;background:0;padding:0px}
#seoscan .webcijferslogo{display:inline;vertical-align:middle;padding-right:30px;}
#seoscan table{width:98%;border-collapse:collapse}#seoscan td{padding:10px;border:1px solid #ddd;background-color:#fff}
#seoscan ul li{list-style-type:disc;margin-left:1.5em;list-style-position:inside}
#serppreview{color:#222;font-family:arial,sans-serif;font-size:16px;width:520px}
#serppreview img{margin:0 4px 0 0}
#serppreview #serptitle{display:inline-block;color:#2518b5;border-bottom:1px solid #2518b5;font-style:normal;padding-bottom:0;margin-bottom:0;line-height:16px}
#serppreview #serpimg{float:left;height:100px}
#serppreview #serplink{color:#00802a;font-style:normal;font-size:14px;line-height:14px}
#serppreview #serpdescription{font-style:normal;font-size:13px;line-height:16px}.meterblue{border:1px solid #ddd;margin-bottom:10px;background-color:#1e5799;float:left;width:100%;border-radius:4px;height:10px}.meterinner{background:-moz-linear-gradient(top,rgba(255,255,255,0.35) 0,rgba(255,255,255,0.35) 1%,rgba(255,255,255,0) 50%,rgba(255,255,255,0.35) 100%);background:-webkit-gradient(linear,left top,left bottom,color-stop(0,rgba(255,255,255,0.35)),color-stop(1%,rgba(255,255,255,0.35)),color-stop(50%,rgba(255,255,255,0)),color-stop(100%,rgba(255,255,255,0.35)));background:-webkit-linear-gradient(top,rgba(255,255,255,0.35) 0,rgba(255,255,255,0.35) 1%,rgba(255,255,255,0) 50%,rgba(255,255,255,0.35) 100%);background:-o-linear-gradient(top,rgba(255,255,255,0.35) 0,rgba(255,255,255,0.35) 1%,rgba(255,255,255,0) 50%,rgba(255,255,255,0.35) 100%);background:-ms-linear-gradient(top,rgba(255,255,255,0.35) 0,rgba(255,255,255,0.35) 1%,rgba(255,255,255,0) 50%,rgba(255,255,255,0.35) 100%);background:linear-gradient(to bottom,rgba(255,255,255,0.35) 0,rgba(255,255,255,0.35) 1%,rgba(255,255,255,0) 50%,rgba(255,255,255,0.35) 100%);float:left;width:100%;border-radius:4px}
.vul,.vulmeter{float:right;background-color:rgba(255,255,255,0.7);border-left:1px solid #ddd;height:10px}
#bla{padding:10px;border:1px solid #ccc;background-color:#fff;}
.nav-tab-active{background-color:#fff;}
.tab{display:none}
.activetab{display:block}
#rankwisetabs .nav-tab{padding:4px 8px;}
.helptab{display:none}
</style>';
}

function cd_meta_box_add() {
	add_meta_box ( 'my-meta-box-id', 'WebCijfers SEO San', 'cd_meta_box_cb', 'post', 'normal', 'high' );
}

function cd_meta_box_cb($post) {
	$permalink = get_permalink ( $post->ID );
	
	?>
<?php echo style()?>
<div class="nav-tab-wrapper" id="rankwisetabs">
    <a href="#" data-div="seoscan" class="nav-tab nav-tab-active">SEO Scan</a>
    <a href="#" data-div="management" class="nav-tab">Management</a>
    <a href="#" data-div="elements" class="nav-tab">Elements</a>
    <a href="#" data-div="advice" class="nav-tab">Advice</a>
    <a href="#" data-div="links" class="nav-tab">Links</a>
    <a href="#" data-div="images" class="nav-tab">Images</a>
    <a href="#" data-div="structureddata" class="nav-tab">Structured Data</a>
    <a href="#" data-div="authorship" class="nav-tab">Authorship</a>
    <a href="#" data-div="feedback" class="nav-tab">Feedback</a>
</div>
<div id="bla">
<div id="seoscan">
	<a id="scan" href="#"><img alt="WebCijfers SEO Scan" height="60" class="wewbcijferslogo" src="<?php echo plugin_dir_url( __FILE__ );?>logoscannow.png" scale="0" style="float:left;padding-right:20px"></a>
	<div style="margin:20px 20px 20px 140px">
	<p>RankWise SEO: the plus behind SEO</p>
	<p>Publish or update your page and start the scan !</p>
	<p>RankWise Footer credits ?
			<input class="rwc" type="radio" name="rwc" value="0" <?php echo ($rwc ==0)?'checked="checked"':''?>>no / 
			<input class="rwc" type="radio" name="rwc" value="1" <?php echo ($rwc ==1)?'checked="checked"':''?>>yes  
			</p>

	</div>
	
</div>
</div>

<script>
	jQuery(document).ready(function($){
		$('.nav-tab').click(function(e){
			e.preventDefault();
			$('.nav-tab-wrapper .nav-tab-active').removeClass('nav-tab-active');
			$(this).addClass('nav-tab-active');
			$('#seoscan .tab').hide();
			$('#seoscan #'+$(this).data('div')).show();
			});


		$(document).on("click", "#scanauthorship", function(e) {
			e.preventDefault();
			var sUrl = $(this).data('url');
			var author = $(this).data('author');
			$.ajax({
			     url:"http://www.rankwise.net/googleplus/index",
			     dataType: 'jsonp',
			     data:{'sUrl':sUrl,'author':author},
			     success:function(json){
			    		console.log(json);
					     $('#authorshipresults').html(json.response);
				    		
			     },
			     error:function(e){
			    	 console.log(e);
			     }
			});


			
		});


		$('.rwc').change(function(e){
			e.preventDefault();
			var data = {
					action: 'change_rwc',
					v: $('.rwc:checked').val()
				};

				$.post(ajaxurl, data);

		});
		
		
		var sUrl = '<?php echo get_permalink ( $post->ID )?>'; 
		$('#scan').click(function(e){
			e.preventDefault();
			$('#seoscan').html('<img width="60" src="<?php echo WP_PLUGIN_URL . '/webcijfers-seo-scan/loader.gif'?>"> .. one moment please.');
			$.ajax({
			     url:"http://www.rankwise.net/seoexternal/wordpress/",
			     dataType: 'jsonp',
			     data:{'sUrl':sUrl},
			     success:function(json){
			    	 if(json.error){
			    		 $('#seoscan').html(json.error);
			    	 } else {
			    		var html = json.response;
				        $('#seoscan').html(html);
				        secondscan(sUrl);
				        
			    	 }
			     },
			     error:function(e){
			    	 $('#seoscan').html('<h2>Whoops !</h2>');
			     },
			});
		});


		function secondscan(sUrl){
			$('.tdImg').each(function() {
				$(this).html('<img style="max-height:50px;max-width:50px;" src="' + $(this).attr("rel") + '">');
			});
			
			$('img').error(function() {
				$(this).remove();
			});
			
			
			$("#internallinks a").removeAttr("href");
			
			$.ajax({
			     url:"http://www.rankwise.net/seo-scan/ajaxscan",
			     dataType: 'jsonp',
			     data:{'url':sUrl},
			     success:function(json){
			    		$('#fbshare').html(json.fbshare);
			    		$('#fblike').html(json.fblike);
			    		$('#fbcomments').html(json.fbcomments);
			    		$('#twittercount').html(json.twittercount);
			    		$('#plus1count').html(json.plus1count);
			    		
			    		$('#custom404').html(json.custom404);
			    		if(json.subdomainredirecturl){
			    		$('#subdomainredirecturl').html(json.subdomainredirecturl);
			    		} else{
			    			$('#subdomainredirecturl').html('No correct redirect detected');
			    				}
			    		
			    		$('#robotstxt').html(json.robotstxt);
			    		$('#favicon').html(json.favicon);
			    		if(json.aSiteMaps){
			    			$('#asitemaps').html('');
			    			for (var i = 0; i < json.aSiteMaps.length; i++) {
			    				$('#asitemaps').append(json.aSiteMaps[i]+'<br />');
			    			}
			    		} else{
			    			$('#asitemaps').html('nee');
			    		}
			     },
			     error:function(e){
			     }
			});
			

		}


		var webcijferstimer;

		$(document).on("click", ".help", function(e) {
			var text = $(this).data('help');
			clearTimeout(webcijferstimer);
			webcijferstimer = setTimeout(function() {
				if ($('#hint').length == 0) {
					$('body').append('<div id="hint" style="position: absolute;	background-color: #fff;	padding: 10px;-webkit-box-shadow: 5px 5px 15px 6px rgba(0, 0, 0, .2);box-shadow: 5px 5px 15px 6px rgba(0, 0, 0, .2);width: auto;max-width: 300px;text-align: left;max-width: 300px;" class="tip" onclick="$(this).remove();"></div>');
				}
				$('#hint').text(text);

				var a = $('#hint').height() + 40;
				var b = $('#hint').width() / 2;
				$('#hint').css('top', e.pageY - a);
				$('#hint').css('left', e.pageX - b);

			}, 200);
		});
	
	});

	
	
	</script>
<?php
}