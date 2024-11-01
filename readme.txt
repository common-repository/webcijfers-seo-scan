=== RankWise SEO WordPress Plugin ===
Contributors: webcijfers, danielmuldernl 
Tags: SEO, authorship, Google, Author Rank, bing, description, google, google webmaster tools, keywords,meta, meta description, meta keywords, follow, noindex, robots meta, search engine optimization, seo, seo pack, sitemap, sitemaps, Webmaster Tools, wordpress seo, xml sitemaps, yahoo, RankWise, Rank Wise, Rank Wise SEO

Requires at least: 3.3
Tested up to: 3.7.2
Stable tag: /trunk/

Contains the SEO core of rankwise.net. Scan the website, individual pages and posts. Contains an authorship check and analyses for Google+ profiles. 

== Description ==

<p style=\"margin: 0in; font-family: Calibri; font-size: 11.0pt;\" lang=\"en-US\"><strong>This is a beta version of the RankWise SEO plugin for WordPress</strong><br /><br />  
  
This is a first release for the working version of the RankWise SEO scan as a WordPress plug-in. The state of art core scanning and analytic core have been incorporated and is fully functional. Also the proof of concept authorship annotation and Google+ profile scan and analysis have been incorporated. Components:<br /><br />

- Summaries with most important optimization pointers;<br />
- SEO meta elements analyses for data elements and rich snippets;<br />
- Optimization pointers per element and ranking factor; <br />
- Image meta optimization analysis and pointers for optimization;<br />
- Structured data elements analyses and optimization pointers;<br />
- Authorship and publisher markup scan and check;<br />
- Google+ profile SEO analysis for keywords found in post;<br /><br />

At the moment we are working hard on improving the incorporation of the core scan elements into the WordPress dashboard to create a better user experience. Also we are working hard to implement the logic for a complete authorship markup scan that verifies the markup for post and the whole website with a click of the button. <br /><br />

<strong>Google+ profile Scan and Analyses</strong><br />
We have incorporated the Google+ API and have full access to all elements for any public Google+ profile and page. At the moment we have applied our existing algorithm on the profile elements like the Tagline and the About elements with just small adjustments for analyzing the text itself. We are developing this very rapidly and expect to add new features on a weekly basis for the coming weeks like:<br /><br />

- Google search engine display preview of Google+ profile;<br />
- In-depth textual and keyword correlation analyses for and SEO pointer;<br />
- Backlink scan;<br />
- etc.<br /><br />

<strong>UPDATE 11/26/2013: we added the PageRank for the Google+ profile off the author!</strong>

</p>

<p>

<strong>Technical details and privacy:</strong><br />
-In order to scan your post the plugin will post the url of your post to the RankWise api. The RankWise server will then fetch your page and analyze it. Your scan will not be saved in our database nor will we place tracking cookies (our own nor third party cookies)<br />
-External scripts and images:<br />
-The SEO SCan loads 3 external JavaScripts. The SEO Scan core JavaScript, the extended scan JavaScript (scans for social shares and common configuration errors) en finally the Google pagespeed JavaScript (scans your site for speed improvements)<br />
-During the scan the following external images are loaded: RankWise icons, thumbnails of images used on your site<br />
-No electrons where harmed during the transmission off this message.<br />

</p>

== Installation ==

Extract the zip file and just drop the contents in the wp-content/plugins/ directory of your WordPress installation and then activate the Plugin from Plugins page.
== Screenshots ==
1. Post and page level scan implementation. No scan performed. Click SCAN NOW to perform page or post level SEO scan.

2. Post and page level scan implementation. Scan results devided into logical tabs for a better overview of the results.
Post and page level scan implementation. Scan results for authorship markup and Google+ profile analyses.

3. Post and page level scan implementation. The Google Authorship check and Google Plus profile scan results.

==Readme Generator== 

This plugin is the WordPress impelmentation off the RankWise SEO scan <a href = 'http://www.rankwise.net'>RankWise</a>. Contact us: daniel@rankwise.net