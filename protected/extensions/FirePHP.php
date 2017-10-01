



<!DOCTYPE html>
<html>
<head>
 <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" >
 <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" >
 
 <meta name="ROBOTS" content="NOARCHIVE">
 
 <link rel="icon" type="image/vnd.microsoft.icon" href="https://ssl.gstatic.com/codesite/ph/images/phosting.ico">
 
 
 <script type="text/javascript">
 
 
 
 
 var codesite_token = "ABZ6GAd6TWfeHDO-03mMd1OS0FHF394L6Q:1417666305055";
 
 
 var CS_env = {"projectName": "yii-firephp", "loggedInUserEmail": "pawitVaap@gmail.com", "token": "ABZ6GAd6TWfeHDO-03mMd1OS0FHF394L6Q:1417666305055", "profileUrl": "/u/102963791977001767790/", "relativeBaseUrl": "", "assetVersionPath": "https://ssl.gstatic.com/codesite/ph/1729405847801014513", "domainName": null, "assetHostPath": "https://ssl.gstatic.com/codesite/ph", "projectHomeUrl": "/p/yii-firephp"};
 var _gaq = _gaq || [];
 _gaq.push(
 ['siteTracker._setAccount', 'UA-18071-1'],
 ['siteTracker._trackPageview']);
 
 _gaq.push(
 ['projectTracker._setAccount', 'UA-163126-8'],
 ['projectTracker._trackPageview']);
 
 (function() {
 var ga = document.createElement('script'); ga.type = 'text/javascript'; ga.async = true;
 ga.src = ('https:' == document.location.protocol ? 'https://ssl' : 'http://www') + '.google-analytics.com/ga.js';
 (document.getElementsByTagName('head')[0] || document.getElementsByTagName('body')[0]).appendChild(ga);
 })();
 
 </script>
 
 
 <title>FirePHP.php - 
 yii-firephp -
 
 
 FirePHP library for the Yii Framework - Google Project Hosting
 </title>
 <link type="text/css" rel="stylesheet" href="https://ssl.gstatic.com/codesite/ph/1729405847801014513/css/core.css">
 
 <link type="text/css" rel="stylesheet" href="https://ssl.gstatic.com/codesite/ph/1729405847801014513/css/ph_detail.css" >
 
 
 <link type="text/css" rel="stylesheet" href="https://ssl.gstatic.com/codesite/ph/1729405847801014513/css/d_sb.css" >
 
 
 
<!--[if IE]>
 <link type="text/css" rel="stylesheet" href="https://ssl.gstatic.com/codesite/ph/1729405847801014513/css/d_ie.css" >
<![endif]-->
 <style type="text/css">
 .menuIcon.off { background: no-repeat url(https://ssl.gstatic.com/codesite/ph/images/dropdown_sprite.gif) 0 -42px }
 .menuIcon.on { background: no-repeat url(https://ssl.gstatic.com/codesite/ph/images/dropdown_sprite.gif) 0 -28px }
 .menuIcon.down { background: no-repeat url(https://ssl.gstatic.com/codesite/ph/images/dropdown_sprite.gif) 0 0; }
 
 
 
  tr.inline_comment {
 background: #fff;
 vertical-align: top;
 }
 div.draft, div.published {
 padding: .3em;
 border: 1px solid #999; 
 margin-bottom: .1em;
 font-family: arial, sans-serif;
 max-width: 60em;
 }
 div.draft {
 background: #ffa;
 } 
 div.published {
 background: #e5ecf9;
 }
 div.published .body, div.draft .body {
 padding: .5em .1em .1em .1em;
 max-width: 60em;
 white-space: pre-wrap;
 white-space: -moz-pre-wrap;
 white-space: -pre-wrap;
 white-space: -o-pre-wrap;
 word-wrap: break-word;
 font-size: 1em;
 }
 div.draft .actions {
 margin-left: 1em;
 font-size: 90%;
 }
 div.draft form {
 padding: .5em .5em .5em 0;
 }
 div.draft textarea, div.published textarea {
 width: 95%;
 height: 10em;
 font-family: arial, sans-serif;
 margin-bottom: .5em;
 }

 
 .nocursor, .nocursor td, .cursor_hidden, .cursor_hidden td {
 background-color: white;
 height: 2px;
 }
 .cursor, .cursor td {
 background-color: darkblue;
 height: 2px;
 display: '';
 }
 
 
.list {
 border: 1px solid white;
 border-bottom: 0;
}

 
 </style>
</head>
<body class="t4">
<script type="text/javascript">
 window.___gcfg = {lang: 'en'};
 (function() 
 {var po = document.createElement("script");
 po.type = "text/javascript"; po.async = true;po.src = "https://apis.google.com/js/plusone.js";
 var s = document.getElementsByTagName("script")[0];
 s.parentNode.insertBefore(po, s);
 })();
</script>
<div class="headbg">

 <div id="gaia">
 

 <span>
 
 
 
 <a href="#" id="multilogin-dropdown" onclick="return false;"
 ><u><b>pawitVaap@gmail.com</b></u> <small>&#9660;</small></a>
 
 
 | <a href="/u/102963791977001767790/" id="projects-dropdown" onclick="return false;"
 ><u>My favorites</u> <small>&#9660;</small></a>
 | <a href="/u/102963791977001767790/" onclick="_CS_click('/gb/ph/profile');"
 title="Profile, Updates, and Settings"
 ><u>Profile</u></a>
 | <a href="https://www.google.com/accounts/Logout?continue=https%3A%2F%2Fcode.google.com%2Fp%2Fyii-firephp%2Fsource%2Fbrowse%2Ftrunk%2FFirePHP.php" 
 onclick="_CS_click('/gb/ph/signout');"
 ><u>Sign out</u></a>
 
 </span>

 </div>

 <div class="gbh" style="left: 0pt;"></div>
 <div class="gbh" style="right: 0pt;"></div>
 
 
 <div style="height: 1px"></div>
<!--[if lte IE 7]>
<div style="text-align:center;">
Your version of Internet Explorer is not supported. Try a browser that
contributes to open source, such as <a href="http://www.firefox.com">Firefox</a>,
<a href="http://www.google.com/chrome">Google Chrome</a>, or
<a href="http://code.google.com/chrome/chromeframe/">Google Chrome Frame</a>.
</div>
<![endif]-->



 <table style="padding:0px; margin: 0px 0px 10px 0px; width:100%" cellpadding="0" cellspacing="0"
 itemscope itemtype="http://schema.org/CreativeWork">
 <tr style="height: 58px;">
 
 
 
 <td id="plogo">
 <link itemprop="url" href="/p/yii-firephp">
 <a href="/p/yii-firephp/">
 
 <img src="https://ssl.gstatic.com/codesite/ph/images/defaultlogo.png" alt="Logo" itemprop="image">
 
 </a>
 </td>
 
 <td style="padding-left: 0.5em">
 
 <div id="pname">
 <a href="/p/yii-firephp/"><span itemprop="name">yii-firephp</span></a>
 </div>
 
 <div id="psum">
 <a id="project_summary_link"
 href="/p/yii-firephp/"><span itemprop="description">FirePHP library for the Yii Framework</span></a>
 
 </div>
 
 
 </td>
 <td style="white-space:nowrap;text-align:right; vertical-align:bottom;">
 
 <form action="/hosting/search">
 <input size="30" name="q" value="" type="text">
 
 <input type="submit" name="projectsearch" value="Search projects" >
 </form>
 
 </tr>
 </table>

</div>

 
<div id="mt" class="gtb"> 
 <a href="/p/yii-firephp/" class="tab ">Project&nbsp;Home</a>
 
 
 
 
 
 
 
 
 <a href="/p/yii-firephp/issues/list"
 class="tab ">Issues</a>
 
 
 
 
 
 <a href="/p/yii-firephp/source/checkout"
 class="tab active">Source</a>
 
 
 
 
 
 
 
 
 <div class=gtbc></div>
</div>
<table cellspacing="0" cellpadding="0" width="100%" align="center" border="0" class="st">
 <tr>
 
 
 
 
 
 
 <td class="subt">
 <div class="st2">
 <div class="isf">
 
 


 <span class="inst1"><a href="/p/yii-firephp/source/checkout">Checkout</a></span> &nbsp;
 <span class="inst2"><a href="/p/yii-firephp/source/browse/">Browse</a></span> &nbsp;
 <span class="inst3"><a href="/p/yii-firephp/source/list">Changes</a></span> &nbsp;
 
 
 
 
 
 
 
 </form>
 <script type="text/javascript">
 
 function codesearchQuery(form) {
 var query = document.getElementById('q').value;
 if (query) { form.action += '%20' + query; }
 }
 </script>
 </div>
</div>

 </td>
 
 
 
 <td align="right" valign="top" class="bevel-right"></td>
 </tr>
</table>


<script type="text/javascript">
 var cancelBubble = false;
 function _go(url) { document.location = url; }
</script>
<div id="maincol"
 
>

 




<div class="expand">
<div id="colcontrol">
<style type="text/css">
 #file_flipper { white-space: nowrap; padding-right: 2em; }
 #file_flipper.hidden { display: none; }
 #file_flipper .pagelink { color: #0000CC; text-decoration: underline; }
 #file_flipper #visiblefiles { padding-left: 0.5em; padding-right: 0.5em; }
</style>
<table id="nav_and_rev" class="list"
 cellpadding="0" cellspacing="0" width="100%">
 <tr>
 
 <td nowrap="nowrap" class="src_crumbs src_nav" width="33%">
 <strong class="src_nav">Source path:&nbsp;</strong>
 <span id="crumb_root">
 
 <a href="/p/yii-firephp/source/browse/">svn</a>/&nbsp;</span>
 <span id="crumb_links" class="ifClosed"><a href="/p/yii-firephp/source/browse/trunk/">trunk</a><span class="sp">/&nbsp;</span>FirePHP.php</span>
 
 


 </td>
 
 
 <td nowrap="nowrap" width="33%" align="center">
 <a href="/p/yii-firephp/source/browse/trunk/FirePHP.php?edit=1"
 ><img src="https://ssl.gstatic.com/codesite/ph/images/pencil-y14.png"
 class="edit_icon">Edit file</a>
 </td>
 
 
 <td nowrap="nowrap" width="33%" align="right">
 <table cellpadding="0" cellspacing="0" style="font-size: 100%"><tr>
 
 
 <td class="flipper">
 <ul class="leftside">
 
 <li><a href="/p/yii-firephp/source/browse/trunk/FirePHP.php?r=2" title="Previous">&lsaquo;r2</a></li>
 
 </ul>
 </td>
 
 <td class="flipper"><b>r3</b></td>
 
 </tr></table>
 </td> 
 </tr>
</table>

<div class="fc">
 
 
 
<style type="text/css">
.undermouse span {
 background-image: url(https://ssl.gstatic.com/codesite/ph/images/comments.gif); }
</style>
<table class="opened" id="review_comment_area"
><tr>
<td id="nums">
<pre><table width="100%"><tr class="nocursor"><td></td></tr></table></pre>
<pre><table width="100%" id="nums_table_0"><tr id="gr_svn3_1"

><td id="1"><a href="#1">1</a></td></tr
><tr id="gr_svn3_2"

><td id="2"><a href="#2">2</a></td></tr
><tr id="gr_svn3_3"

><td id="3"><a href="#3">3</a></td></tr
><tr id="gr_svn3_4"

><td id="4"><a href="#4">4</a></td></tr
><tr id="gr_svn3_5"

><td id="5"><a href="#5">5</a></td></tr
><tr id="gr_svn3_6"

><td id="6"><a href="#6">6</a></td></tr
><tr id="gr_svn3_7"

><td id="7"><a href="#7">7</a></td></tr
><tr id="gr_svn3_8"

><td id="8"><a href="#8">8</a></td></tr
><tr id="gr_svn3_9"

><td id="9"><a href="#9">9</a></td></tr
><tr id="gr_svn3_10"

><td id="10"><a href="#10">10</a></td></tr
><tr id="gr_svn3_11"

><td id="11"><a href="#11">11</a></td></tr
><tr id="gr_svn3_12"

><td id="12"><a href="#12">12</a></td></tr
><tr id="gr_svn3_13"

><td id="13"><a href="#13">13</a></td></tr
><tr id="gr_svn3_14"

><td id="14"><a href="#14">14</a></td></tr
><tr id="gr_svn3_15"

><td id="15"><a href="#15">15</a></td></tr
><tr id="gr_svn3_16"

><td id="16"><a href="#16">16</a></td></tr
><tr id="gr_svn3_17"

><td id="17"><a href="#17">17</a></td></tr
><tr id="gr_svn3_18"

><td id="18"><a href="#18">18</a></td></tr
><tr id="gr_svn3_19"

><td id="19"><a href="#19">19</a></td></tr
><tr id="gr_svn3_20"

><td id="20"><a href="#20">20</a></td></tr
><tr id="gr_svn3_21"

><td id="21"><a href="#21">21</a></td></tr
><tr id="gr_svn3_22"

><td id="22"><a href="#22">22</a></td></tr
><tr id="gr_svn3_23"

><td id="23"><a href="#23">23</a></td></tr
><tr id="gr_svn3_24"

><td id="24"><a href="#24">24</a></td></tr
><tr id="gr_svn3_25"

><td id="25"><a href="#25">25</a></td></tr
><tr id="gr_svn3_26"

><td id="26"><a href="#26">26</a></td></tr
><tr id="gr_svn3_27"

><td id="27"><a href="#27">27</a></td></tr
><tr id="gr_svn3_28"

><td id="28"><a href="#28">28</a></td></tr
><tr id="gr_svn3_29"

><td id="29"><a href="#29">29</a></td></tr
><tr id="gr_svn3_30"

><td id="30"><a href="#30">30</a></td></tr
><tr id="gr_svn3_31"

><td id="31"><a href="#31">31</a></td></tr
><tr id="gr_svn3_32"

><td id="32"><a href="#32">32</a></td></tr
><tr id="gr_svn3_33"

><td id="33"><a href="#33">33</a></td></tr
><tr id="gr_svn3_34"

><td id="34"><a href="#34">34</a></td></tr
><tr id="gr_svn3_35"

><td id="35"><a href="#35">35</a></td></tr
><tr id="gr_svn3_36"

><td id="36"><a href="#36">36</a></td></tr
><tr id="gr_svn3_37"

><td id="37"><a href="#37">37</a></td></tr
><tr id="gr_svn3_38"

><td id="38"><a href="#38">38</a></td></tr
><tr id="gr_svn3_39"

><td id="39"><a href="#39">39</a></td></tr
><tr id="gr_svn3_40"

><td id="40"><a href="#40">40</a></td></tr
><tr id="gr_svn3_41"

><td id="41"><a href="#41">41</a></td></tr
><tr id="gr_svn3_42"

><td id="42"><a href="#42">42</a></td></tr
><tr id="gr_svn3_43"

><td id="43"><a href="#43">43</a></td></tr
><tr id="gr_svn3_44"

><td id="44"><a href="#44">44</a></td></tr
><tr id="gr_svn3_45"

><td id="45"><a href="#45">45</a></td></tr
><tr id="gr_svn3_46"

><td id="46"><a href="#46">46</a></td></tr
><tr id="gr_svn3_47"

><td id="47"><a href="#47">47</a></td></tr
><tr id="gr_svn3_48"

><td id="48"><a href="#48">48</a></td></tr
><tr id="gr_svn3_49"

><td id="49"><a href="#49">49</a></td></tr
><tr id="gr_svn3_50"

><td id="50"><a href="#50">50</a></td></tr
><tr id="gr_svn3_51"

><td id="51"><a href="#51">51</a></td></tr
><tr id="gr_svn3_52"

><td id="52"><a href="#52">52</a></td></tr
><tr id="gr_svn3_53"

><td id="53"><a href="#53">53</a></td></tr
><tr id="gr_svn3_54"

><td id="54"><a href="#54">54</a></td></tr
><tr id="gr_svn3_55"

><td id="55"><a href="#55">55</a></td></tr
><tr id="gr_svn3_56"

><td id="56"><a href="#56">56</a></td></tr
><tr id="gr_svn3_57"

><td id="57"><a href="#57">57</a></td></tr
><tr id="gr_svn3_58"

><td id="58"><a href="#58">58</a></td></tr
><tr id="gr_svn3_59"

><td id="59"><a href="#59">59</a></td></tr
><tr id="gr_svn3_60"

><td id="60"><a href="#60">60</a></td></tr
><tr id="gr_svn3_61"

><td id="61"><a href="#61">61</a></td></tr
><tr id="gr_svn3_62"

><td id="62"><a href="#62">62</a></td></tr
><tr id="gr_svn3_63"

><td id="63"><a href="#63">63</a></td></tr
><tr id="gr_svn3_64"

><td id="64"><a href="#64">64</a></td></tr
><tr id="gr_svn3_65"

><td id="65"><a href="#65">65</a></td></tr
><tr id="gr_svn3_66"

><td id="66"><a href="#66">66</a></td></tr
><tr id="gr_svn3_67"

><td id="67"><a href="#67">67</a></td></tr
><tr id="gr_svn3_68"

><td id="68"><a href="#68">68</a></td></tr
><tr id="gr_svn3_69"

><td id="69"><a href="#69">69</a></td></tr
><tr id="gr_svn3_70"

><td id="70"><a href="#70">70</a></td></tr
><tr id="gr_svn3_71"

><td id="71"><a href="#71">71</a></td></tr
><tr id="gr_svn3_72"

><td id="72"><a href="#72">72</a></td></tr
><tr id="gr_svn3_73"

><td id="73"><a href="#73">73</a></td></tr
><tr id="gr_svn3_74"

><td id="74"><a href="#74">74</a></td></tr
><tr id="gr_svn3_75"

><td id="75"><a href="#75">75</a></td></tr
><tr id="gr_svn3_76"

><td id="76"><a href="#76">76</a></td></tr
><tr id="gr_svn3_77"

><td id="77"><a href="#77">77</a></td></tr
><tr id="gr_svn3_78"

><td id="78"><a href="#78">78</a></td></tr
><tr id="gr_svn3_79"

><td id="79"><a href="#79">79</a></td></tr
><tr id="gr_svn3_80"

><td id="80"><a href="#80">80</a></td></tr
><tr id="gr_svn3_81"

><td id="81"><a href="#81">81</a></td></tr
><tr id="gr_svn3_82"

><td id="82"><a href="#82">82</a></td></tr
><tr id="gr_svn3_83"

><td id="83"><a href="#83">83</a></td></tr
><tr id="gr_svn3_84"

><td id="84"><a href="#84">84</a></td></tr
><tr id="gr_svn3_85"

><td id="85"><a href="#85">85</a></td></tr
><tr id="gr_svn3_86"

><td id="86"><a href="#86">86</a></td></tr
><tr id="gr_svn3_87"

><td id="87"><a href="#87">87</a></td></tr
><tr id="gr_svn3_88"

><td id="88"><a href="#88">88</a></td></tr
><tr id="gr_svn3_89"

><td id="89"><a href="#89">89</a></td></tr
><tr id="gr_svn3_90"

><td id="90"><a href="#90">90</a></td></tr
><tr id="gr_svn3_91"

><td id="91"><a href="#91">91</a></td></tr
><tr id="gr_svn3_92"

><td id="92"><a href="#92">92</a></td></tr
><tr id="gr_svn3_93"

><td id="93"><a href="#93">93</a></td></tr
><tr id="gr_svn3_94"

><td id="94"><a href="#94">94</a></td></tr
><tr id="gr_svn3_95"

><td id="95"><a href="#95">95</a></td></tr
><tr id="gr_svn3_96"

><td id="96"><a href="#96">96</a></td></tr
><tr id="gr_svn3_97"

><td id="97"><a href="#97">97</a></td></tr
><tr id="gr_svn3_98"

><td id="98"><a href="#98">98</a></td></tr
><tr id="gr_svn3_99"

><td id="99"><a href="#99">99</a></td></tr
><tr id="gr_svn3_100"

><td id="100"><a href="#100">100</a></td></tr
><tr id="gr_svn3_101"

><td id="101"><a href="#101">101</a></td></tr
><tr id="gr_svn3_102"

><td id="102"><a href="#102">102</a></td></tr
><tr id="gr_svn3_103"

><td id="103"><a href="#103">103</a></td></tr
><tr id="gr_svn3_104"

><td id="104"><a href="#104">104</a></td></tr
><tr id="gr_svn3_105"

><td id="105"><a href="#105">105</a></td></tr
><tr id="gr_svn3_106"

><td id="106"><a href="#106">106</a></td></tr
><tr id="gr_svn3_107"

><td id="107"><a href="#107">107</a></td></tr
><tr id="gr_svn3_108"

><td id="108"><a href="#108">108</a></td></tr
><tr id="gr_svn3_109"

><td id="109"><a href="#109">109</a></td></tr
><tr id="gr_svn3_110"

><td id="110"><a href="#110">110</a></td></tr
><tr id="gr_svn3_111"

><td id="111"><a href="#111">111</a></td></tr
><tr id="gr_svn3_112"

><td id="112"><a href="#112">112</a></td></tr
><tr id="gr_svn3_113"

><td id="113"><a href="#113">113</a></td></tr
><tr id="gr_svn3_114"

><td id="114"><a href="#114">114</a></td></tr
><tr id="gr_svn3_115"

><td id="115"><a href="#115">115</a></td></tr
><tr id="gr_svn3_116"

><td id="116"><a href="#116">116</a></td></tr
><tr id="gr_svn3_117"

><td id="117"><a href="#117">117</a></td></tr
><tr id="gr_svn3_118"

><td id="118"><a href="#118">118</a></td></tr
><tr id="gr_svn3_119"

><td id="119"><a href="#119">119</a></td></tr
><tr id="gr_svn3_120"

><td id="120"><a href="#120">120</a></td></tr
><tr id="gr_svn3_121"

><td id="121"><a href="#121">121</a></td></tr
><tr id="gr_svn3_122"

><td id="122"><a href="#122">122</a></td></tr
><tr id="gr_svn3_123"

><td id="123"><a href="#123">123</a></td></tr
><tr id="gr_svn3_124"

><td id="124"><a href="#124">124</a></td></tr
><tr id="gr_svn3_125"

><td id="125"><a href="#125">125</a></td></tr
><tr id="gr_svn3_126"

><td id="126"><a href="#126">126</a></td></tr
><tr id="gr_svn3_127"

><td id="127"><a href="#127">127</a></td></tr
><tr id="gr_svn3_128"

><td id="128"><a href="#128">128</a></td></tr
><tr id="gr_svn3_129"

><td id="129"><a href="#129">129</a></td></tr
><tr id="gr_svn3_130"

><td id="130"><a href="#130">130</a></td></tr
><tr id="gr_svn3_131"

><td id="131"><a href="#131">131</a></td></tr
><tr id="gr_svn3_132"

><td id="132"><a href="#132">132</a></td></tr
><tr id="gr_svn3_133"

><td id="133"><a href="#133">133</a></td></tr
><tr id="gr_svn3_134"

><td id="134"><a href="#134">134</a></td></tr
><tr id="gr_svn3_135"

><td id="135"><a href="#135">135</a></td></tr
><tr id="gr_svn3_136"

><td id="136"><a href="#136">136</a></td></tr
><tr id="gr_svn3_137"

><td id="137"><a href="#137">137</a></td></tr
><tr id="gr_svn3_138"

><td id="138"><a href="#138">138</a></td></tr
><tr id="gr_svn3_139"

><td id="139"><a href="#139">139</a></td></tr
><tr id="gr_svn3_140"

><td id="140"><a href="#140">140</a></td></tr
><tr id="gr_svn3_141"

><td id="141"><a href="#141">141</a></td></tr
><tr id="gr_svn3_142"

><td id="142"><a href="#142">142</a></td></tr
><tr id="gr_svn3_143"

><td id="143"><a href="#143">143</a></td></tr
><tr id="gr_svn3_144"

><td id="144"><a href="#144">144</a></td></tr
><tr id="gr_svn3_145"

><td id="145"><a href="#145">145</a></td></tr
><tr id="gr_svn3_146"

><td id="146"><a href="#146">146</a></td></tr
><tr id="gr_svn3_147"

><td id="147"><a href="#147">147</a></td></tr
><tr id="gr_svn3_148"

><td id="148"><a href="#148">148</a></td></tr
><tr id="gr_svn3_149"

><td id="149"><a href="#149">149</a></td></tr
><tr id="gr_svn3_150"

><td id="150"><a href="#150">150</a></td></tr
><tr id="gr_svn3_151"

><td id="151"><a href="#151">151</a></td></tr
><tr id="gr_svn3_152"

><td id="152"><a href="#152">152</a></td></tr
><tr id="gr_svn3_153"

><td id="153"><a href="#153">153</a></td></tr
><tr id="gr_svn3_154"

><td id="154"><a href="#154">154</a></td></tr
><tr id="gr_svn3_155"

><td id="155"><a href="#155">155</a></td></tr
><tr id="gr_svn3_156"

><td id="156"><a href="#156">156</a></td></tr
><tr id="gr_svn3_157"

><td id="157"><a href="#157">157</a></td></tr
><tr id="gr_svn3_158"

><td id="158"><a href="#158">158</a></td></tr
><tr id="gr_svn3_159"

><td id="159"><a href="#159">159</a></td></tr
><tr id="gr_svn3_160"

><td id="160"><a href="#160">160</a></td></tr
><tr id="gr_svn3_161"

><td id="161"><a href="#161">161</a></td></tr
><tr id="gr_svn3_162"

><td id="162"><a href="#162">162</a></td></tr
><tr id="gr_svn3_163"

><td id="163"><a href="#163">163</a></td></tr
><tr id="gr_svn3_164"

><td id="164"><a href="#164">164</a></td></tr
><tr id="gr_svn3_165"

><td id="165"><a href="#165">165</a></td></tr
><tr id="gr_svn3_166"

><td id="166"><a href="#166">166</a></td></tr
><tr id="gr_svn3_167"

><td id="167"><a href="#167">167</a></td></tr
><tr id="gr_svn3_168"

><td id="168"><a href="#168">168</a></td></tr
><tr id="gr_svn3_169"

><td id="169"><a href="#169">169</a></td></tr
><tr id="gr_svn3_170"

><td id="170"><a href="#170">170</a></td></tr
><tr id="gr_svn3_171"

><td id="171"><a href="#171">171</a></td></tr
><tr id="gr_svn3_172"

><td id="172"><a href="#172">172</a></td></tr
><tr id="gr_svn3_173"

><td id="173"><a href="#173">173</a></td></tr
><tr id="gr_svn3_174"

><td id="174"><a href="#174">174</a></td></tr
><tr id="gr_svn3_175"

><td id="175"><a href="#175">175</a></td></tr
><tr id="gr_svn3_176"

><td id="176"><a href="#176">176</a></td></tr
><tr id="gr_svn3_177"

><td id="177"><a href="#177">177</a></td></tr
><tr id="gr_svn3_178"

><td id="178"><a href="#178">178</a></td></tr
><tr id="gr_svn3_179"

><td id="179"><a href="#179">179</a></td></tr
><tr id="gr_svn3_180"

><td id="180"><a href="#180">180</a></td></tr
><tr id="gr_svn3_181"

><td id="181"><a href="#181">181</a></td></tr
><tr id="gr_svn3_182"

><td id="182"><a href="#182">182</a></td></tr
><tr id="gr_svn3_183"

><td id="183"><a href="#183">183</a></td></tr
><tr id="gr_svn3_184"

><td id="184"><a href="#184">184</a></td></tr
><tr id="gr_svn3_185"

><td id="185"><a href="#185">185</a></td></tr
><tr id="gr_svn3_186"

><td id="186"><a href="#186">186</a></td></tr
><tr id="gr_svn3_187"

><td id="187"><a href="#187">187</a></td></tr
><tr id="gr_svn3_188"

><td id="188"><a href="#188">188</a></td></tr
><tr id="gr_svn3_189"

><td id="189"><a href="#189">189</a></td></tr
><tr id="gr_svn3_190"

><td id="190"><a href="#190">190</a></td></tr
><tr id="gr_svn3_191"

><td id="191"><a href="#191">191</a></td></tr
><tr id="gr_svn3_192"

><td id="192"><a href="#192">192</a></td></tr
><tr id="gr_svn3_193"

><td id="193"><a href="#193">193</a></td></tr
><tr id="gr_svn3_194"

><td id="194"><a href="#194">194</a></td></tr
><tr id="gr_svn3_195"

><td id="195"><a href="#195">195</a></td></tr
><tr id="gr_svn3_196"

><td id="196"><a href="#196">196</a></td></tr
><tr id="gr_svn3_197"

><td id="197"><a href="#197">197</a></td></tr
><tr id="gr_svn3_198"

><td id="198"><a href="#198">198</a></td></tr
><tr id="gr_svn3_199"

><td id="199"><a href="#199">199</a></td></tr
><tr id="gr_svn3_200"

><td id="200"><a href="#200">200</a></td></tr
><tr id="gr_svn3_201"

><td id="201"><a href="#201">201</a></td></tr
><tr id="gr_svn3_202"

><td id="202"><a href="#202">202</a></td></tr
><tr id="gr_svn3_203"

><td id="203"><a href="#203">203</a></td></tr
><tr id="gr_svn3_204"

><td id="204"><a href="#204">204</a></td></tr
><tr id="gr_svn3_205"

><td id="205"><a href="#205">205</a></td></tr
><tr id="gr_svn3_206"

><td id="206"><a href="#206">206</a></td></tr
><tr id="gr_svn3_207"

><td id="207"><a href="#207">207</a></td></tr
><tr id="gr_svn3_208"

><td id="208"><a href="#208">208</a></td></tr
><tr id="gr_svn3_209"

><td id="209"><a href="#209">209</a></td></tr
><tr id="gr_svn3_210"

><td id="210"><a href="#210">210</a></td></tr
><tr id="gr_svn3_211"

><td id="211"><a href="#211">211</a></td></tr
><tr id="gr_svn3_212"

><td id="212"><a href="#212">212</a></td></tr
><tr id="gr_svn3_213"

><td id="213"><a href="#213">213</a></td></tr
><tr id="gr_svn3_214"

><td id="214"><a href="#214">214</a></td></tr
><tr id="gr_svn3_215"

><td id="215"><a href="#215">215</a></td></tr
><tr id="gr_svn3_216"

><td id="216"><a href="#216">216</a></td></tr
><tr id="gr_svn3_217"

><td id="217"><a href="#217">217</a></td></tr
><tr id="gr_svn3_218"

><td id="218"><a href="#218">218</a></td></tr
><tr id="gr_svn3_219"

><td id="219"><a href="#219">219</a></td></tr
><tr id="gr_svn3_220"

><td id="220"><a href="#220">220</a></td></tr
><tr id="gr_svn3_221"

><td id="221"><a href="#221">221</a></td></tr
><tr id="gr_svn3_222"

><td id="222"><a href="#222">222</a></td></tr
><tr id="gr_svn3_223"

><td id="223"><a href="#223">223</a></td></tr
><tr id="gr_svn3_224"

><td id="224"><a href="#224">224</a></td></tr
><tr id="gr_svn3_225"

><td id="225"><a href="#225">225</a></td></tr
><tr id="gr_svn3_226"

><td id="226"><a href="#226">226</a></td></tr
><tr id="gr_svn3_227"

><td id="227"><a href="#227">227</a></td></tr
><tr id="gr_svn3_228"

><td id="228"><a href="#228">228</a></td></tr
><tr id="gr_svn3_229"

><td id="229"><a href="#229">229</a></td></tr
><tr id="gr_svn3_230"

><td id="230"><a href="#230">230</a></td></tr
><tr id="gr_svn3_231"

><td id="231"><a href="#231">231</a></td></tr
><tr id="gr_svn3_232"

><td id="232"><a href="#232">232</a></td></tr
><tr id="gr_svn3_233"

><td id="233"><a href="#233">233</a></td></tr
><tr id="gr_svn3_234"

><td id="234"><a href="#234">234</a></td></tr
><tr id="gr_svn3_235"

><td id="235"><a href="#235">235</a></td></tr
><tr id="gr_svn3_236"

><td id="236"><a href="#236">236</a></td></tr
><tr id="gr_svn3_237"

><td id="237"><a href="#237">237</a></td></tr
><tr id="gr_svn3_238"

><td id="238"><a href="#238">238</a></td></tr
><tr id="gr_svn3_239"

><td id="239"><a href="#239">239</a></td></tr
><tr id="gr_svn3_240"

><td id="240"><a href="#240">240</a></td></tr
><tr id="gr_svn3_241"

><td id="241"><a href="#241">241</a></td></tr
><tr id="gr_svn3_242"

><td id="242"><a href="#242">242</a></td></tr
><tr id="gr_svn3_243"

><td id="243"><a href="#243">243</a></td></tr
><tr id="gr_svn3_244"

><td id="244"><a href="#244">244</a></td></tr
><tr id="gr_svn3_245"

><td id="245"><a href="#245">245</a></td></tr
><tr id="gr_svn3_246"

><td id="246"><a href="#246">246</a></td></tr
><tr id="gr_svn3_247"

><td id="247"><a href="#247">247</a></td></tr
><tr id="gr_svn3_248"

><td id="248"><a href="#248">248</a></td></tr
><tr id="gr_svn3_249"

><td id="249"><a href="#249">249</a></td></tr
><tr id="gr_svn3_250"

><td id="250"><a href="#250">250</a></td></tr
><tr id="gr_svn3_251"

><td id="251"><a href="#251">251</a></td></tr
><tr id="gr_svn3_252"

><td id="252"><a href="#252">252</a></td></tr
><tr id="gr_svn3_253"

><td id="253"><a href="#253">253</a></td></tr
><tr id="gr_svn3_254"

><td id="254"><a href="#254">254</a></td></tr
><tr id="gr_svn3_255"

><td id="255"><a href="#255">255</a></td></tr
><tr id="gr_svn3_256"

><td id="256"><a href="#256">256</a></td></tr
><tr id="gr_svn3_257"

><td id="257"><a href="#257">257</a></td></tr
><tr id="gr_svn3_258"

><td id="258"><a href="#258">258</a></td></tr
><tr id="gr_svn3_259"

><td id="259"><a href="#259">259</a></td></tr
><tr id="gr_svn3_260"

><td id="260"><a href="#260">260</a></td></tr
><tr id="gr_svn3_261"

><td id="261"><a href="#261">261</a></td></tr
><tr id="gr_svn3_262"

><td id="262"><a href="#262">262</a></td></tr
><tr id="gr_svn3_263"

><td id="263"><a href="#263">263</a></td></tr
><tr id="gr_svn3_264"

><td id="264"><a href="#264">264</a></td></tr
><tr id="gr_svn3_265"

><td id="265"><a href="#265">265</a></td></tr
><tr id="gr_svn3_266"

><td id="266"><a href="#266">266</a></td></tr
><tr id="gr_svn3_267"

><td id="267"><a href="#267">267</a></td></tr
><tr id="gr_svn3_268"

><td id="268"><a href="#268">268</a></td></tr
><tr id="gr_svn3_269"

><td id="269"><a href="#269">269</a></td></tr
><tr id="gr_svn3_270"

><td id="270"><a href="#270">270</a></td></tr
><tr id="gr_svn3_271"

><td id="271"><a href="#271">271</a></td></tr
><tr id="gr_svn3_272"

><td id="272"><a href="#272">272</a></td></tr
><tr id="gr_svn3_273"

><td id="273"><a href="#273">273</a></td></tr
><tr id="gr_svn3_274"

><td id="274"><a href="#274">274</a></td></tr
><tr id="gr_svn3_275"

><td id="275"><a href="#275">275</a></td></tr
><tr id="gr_svn3_276"

><td id="276"><a href="#276">276</a></td></tr
><tr id="gr_svn3_277"

><td id="277"><a href="#277">277</a></td></tr
><tr id="gr_svn3_278"

><td id="278"><a href="#278">278</a></td></tr
><tr id="gr_svn3_279"

><td id="279"><a href="#279">279</a></td></tr
><tr id="gr_svn3_280"

><td id="280"><a href="#280">280</a></td></tr
><tr id="gr_svn3_281"

><td id="281"><a href="#281">281</a></td></tr
><tr id="gr_svn3_282"

><td id="282"><a href="#282">282</a></td></tr
><tr id="gr_svn3_283"

><td id="283"><a href="#283">283</a></td></tr
><tr id="gr_svn3_284"

><td id="284"><a href="#284">284</a></td></tr
><tr id="gr_svn3_285"

><td id="285"><a href="#285">285</a></td></tr
><tr id="gr_svn3_286"

><td id="286"><a href="#286">286</a></td></tr
><tr id="gr_svn3_287"

><td id="287"><a href="#287">287</a></td></tr
><tr id="gr_svn3_288"

><td id="288"><a href="#288">288</a></td></tr
><tr id="gr_svn3_289"

><td id="289"><a href="#289">289</a></td></tr
><tr id="gr_svn3_290"

><td id="290"><a href="#290">290</a></td></tr
><tr id="gr_svn3_291"

><td id="291"><a href="#291">291</a></td></tr
><tr id="gr_svn3_292"

><td id="292"><a href="#292">292</a></td></tr
><tr id="gr_svn3_293"

><td id="293"><a href="#293">293</a></td></tr
><tr id="gr_svn3_294"

><td id="294"><a href="#294">294</a></td></tr
><tr id="gr_svn3_295"

><td id="295"><a href="#295">295</a></td></tr
><tr id="gr_svn3_296"

><td id="296"><a href="#296">296</a></td></tr
><tr id="gr_svn3_297"

><td id="297"><a href="#297">297</a></td></tr
><tr id="gr_svn3_298"

><td id="298"><a href="#298">298</a></td></tr
><tr id="gr_svn3_299"

><td id="299"><a href="#299">299</a></td></tr
><tr id="gr_svn3_300"

><td id="300"><a href="#300">300</a></td></tr
><tr id="gr_svn3_301"

><td id="301"><a href="#301">301</a></td></tr
><tr id="gr_svn3_302"

><td id="302"><a href="#302">302</a></td></tr
><tr id="gr_svn3_303"

><td id="303"><a href="#303">303</a></td></tr
><tr id="gr_svn3_304"

><td id="304"><a href="#304">304</a></td></tr
><tr id="gr_svn3_305"

><td id="305"><a href="#305">305</a></td></tr
><tr id="gr_svn3_306"

><td id="306"><a href="#306">306</a></td></tr
><tr id="gr_svn3_307"

><td id="307"><a href="#307">307</a></td></tr
><tr id="gr_svn3_308"

><td id="308"><a href="#308">308</a></td></tr
><tr id="gr_svn3_309"

><td id="309"><a href="#309">309</a></td></tr
><tr id="gr_svn3_310"

><td id="310"><a href="#310">310</a></td></tr
><tr id="gr_svn3_311"

><td id="311"><a href="#311">311</a></td></tr
><tr id="gr_svn3_312"

><td id="312"><a href="#312">312</a></td></tr
><tr id="gr_svn3_313"

><td id="313"><a href="#313">313</a></td></tr
><tr id="gr_svn3_314"

><td id="314"><a href="#314">314</a></td></tr
><tr id="gr_svn3_315"

><td id="315"><a href="#315">315</a></td></tr
><tr id="gr_svn3_316"

><td id="316"><a href="#316">316</a></td></tr
><tr id="gr_svn3_317"

><td id="317"><a href="#317">317</a></td></tr
><tr id="gr_svn3_318"

><td id="318"><a href="#318">318</a></td></tr
><tr id="gr_svn3_319"

><td id="319"><a href="#319">319</a></td></tr
><tr id="gr_svn3_320"

><td id="320"><a href="#320">320</a></td></tr
><tr id="gr_svn3_321"

><td id="321"><a href="#321">321</a></td></tr
><tr id="gr_svn3_322"

><td id="322"><a href="#322">322</a></td></tr
><tr id="gr_svn3_323"

><td id="323"><a href="#323">323</a></td></tr
><tr id="gr_svn3_324"

><td id="324"><a href="#324">324</a></td></tr
><tr id="gr_svn3_325"

><td id="325"><a href="#325">325</a></td></tr
><tr id="gr_svn3_326"

><td id="326"><a href="#326">326</a></td></tr
><tr id="gr_svn3_327"

><td id="327"><a href="#327">327</a></td></tr
><tr id="gr_svn3_328"

><td id="328"><a href="#328">328</a></td></tr
><tr id="gr_svn3_329"

><td id="329"><a href="#329">329</a></td></tr
><tr id="gr_svn3_330"

><td id="330"><a href="#330">330</a></td></tr
><tr id="gr_svn3_331"

><td id="331"><a href="#331">331</a></td></tr
><tr id="gr_svn3_332"

><td id="332"><a href="#332">332</a></td></tr
><tr id="gr_svn3_333"

><td id="333"><a href="#333">333</a></td></tr
><tr id="gr_svn3_334"

><td id="334"><a href="#334">334</a></td></tr
><tr id="gr_svn3_335"

><td id="335"><a href="#335">335</a></td></tr
><tr id="gr_svn3_336"

><td id="336"><a href="#336">336</a></td></tr
><tr id="gr_svn3_337"

><td id="337"><a href="#337">337</a></td></tr
><tr id="gr_svn3_338"

><td id="338"><a href="#338">338</a></td></tr
><tr id="gr_svn3_339"

><td id="339"><a href="#339">339</a></td></tr
><tr id="gr_svn3_340"

><td id="340"><a href="#340">340</a></td></tr
><tr id="gr_svn3_341"

><td id="341"><a href="#341">341</a></td></tr
><tr id="gr_svn3_342"

><td id="342"><a href="#342">342</a></td></tr
><tr id="gr_svn3_343"

><td id="343"><a href="#343">343</a></td></tr
><tr id="gr_svn3_344"

><td id="344"><a href="#344">344</a></td></tr
><tr id="gr_svn3_345"

><td id="345"><a href="#345">345</a></td></tr
><tr id="gr_svn3_346"

><td id="346"><a href="#346">346</a></td></tr
><tr id="gr_svn3_347"

><td id="347"><a href="#347">347</a></td></tr
><tr id="gr_svn3_348"

><td id="348"><a href="#348">348</a></td></tr
><tr id="gr_svn3_349"

><td id="349"><a href="#349">349</a></td></tr
><tr id="gr_svn3_350"

><td id="350"><a href="#350">350</a></td></tr
><tr id="gr_svn3_351"

><td id="351"><a href="#351">351</a></td></tr
><tr id="gr_svn3_352"

><td id="352"><a href="#352">352</a></td></tr
><tr id="gr_svn3_353"

><td id="353"><a href="#353">353</a></td></tr
><tr id="gr_svn3_354"

><td id="354"><a href="#354">354</a></td></tr
><tr id="gr_svn3_355"

><td id="355"><a href="#355">355</a></td></tr
><tr id="gr_svn3_356"

><td id="356"><a href="#356">356</a></td></tr
><tr id="gr_svn3_357"

><td id="357"><a href="#357">357</a></td></tr
><tr id="gr_svn3_358"

><td id="358"><a href="#358">358</a></td></tr
><tr id="gr_svn3_359"

><td id="359"><a href="#359">359</a></td></tr
><tr id="gr_svn3_360"

><td id="360"><a href="#360">360</a></td></tr
><tr id="gr_svn3_361"

><td id="361"><a href="#361">361</a></td></tr
><tr id="gr_svn3_362"

><td id="362"><a href="#362">362</a></td></tr
><tr id="gr_svn3_363"

><td id="363"><a href="#363">363</a></td></tr
><tr id="gr_svn3_364"

><td id="364"><a href="#364">364</a></td></tr
><tr id="gr_svn3_365"

><td id="365"><a href="#365">365</a></td></tr
><tr id="gr_svn3_366"

><td id="366"><a href="#366">366</a></td></tr
><tr id="gr_svn3_367"

><td id="367"><a href="#367">367</a></td></tr
><tr id="gr_svn3_368"

><td id="368"><a href="#368">368</a></td></tr
><tr id="gr_svn3_369"

><td id="369"><a href="#369">369</a></td></tr
><tr id="gr_svn3_370"

><td id="370"><a href="#370">370</a></td></tr
><tr id="gr_svn3_371"

><td id="371"><a href="#371">371</a></td></tr
><tr id="gr_svn3_372"

><td id="372"><a href="#372">372</a></td></tr
><tr id="gr_svn3_373"

><td id="373"><a href="#373">373</a></td></tr
><tr id="gr_svn3_374"

><td id="374"><a href="#374">374</a></td></tr
><tr id="gr_svn3_375"

><td id="375"><a href="#375">375</a></td></tr
><tr id="gr_svn3_376"

><td id="376"><a href="#376">376</a></td></tr
><tr id="gr_svn3_377"

><td id="377"><a href="#377">377</a></td></tr
><tr id="gr_svn3_378"

><td id="378"><a href="#378">378</a></td></tr
><tr id="gr_svn3_379"

><td id="379"><a href="#379">379</a></td></tr
><tr id="gr_svn3_380"

><td id="380"><a href="#380">380</a></td></tr
><tr id="gr_svn3_381"

><td id="381"><a href="#381">381</a></td></tr
><tr id="gr_svn3_382"

><td id="382"><a href="#382">382</a></td></tr
><tr id="gr_svn3_383"

><td id="383"><a href="#383">383</a></td></tr
><tr id="gr_svn3_384"

><td id="384"><a href="#384">384</a></td></tr
><tr id="gr_svn3_385"

><td id="385"><a href="#385">385</a></td></tr
><tr id="gr_svn3_386"

><td id="386"><a href="#386">386</a></td></tr
><tr id="gr_svn3_387"

><td id="387"><a href="#387">387</a></td></tr
><tr id="gr_svn3_388"

><td id="388"><a href="#388">388</a></td></tr
><tr id="gr_svn3_389"

><td id="389"><a href="#389">389</a></td></tr
><tr id="gr_svn3_390"

><td id="390"><a href="#390">390</a></td></tr
><tr id="gr_svn3_391"

><td id="391"><a href="#391">391</a></td></tr
><tr id="gr_svn3_392"

><td id="392"><a href="#392">392</a></td></tr
><tr id="gr_svn3_393"

><td id="393"><a href="#393">393</a></td></tr
><tr id="gr_svn3_394"

><td id="394"><a href="#394">394</a></td></tr
><tr id="gr_svn3_395"

><td id="395"><a href="#395">395</a></td></tr
><tr id="gr_svn3_396"

><td id="396"><a href="#396">396</a></td></tr
><tr id="gr_svn3_397"

><td id="397"><a href="#397">397</a></td></tr
><tr id="gr_svn3_398"

><td id="398"><a href="#398">398</a></td></tr
><tr id="gr_svn3_399"

><td id="399"><a href="#399">399</a></td></tr
><tr id="gr_svn3_400"

><td id="400"><a href="#400">400</a></td></tr
><tr id="gr_svn3_401"

><td id="401"><a href="#401">401</a></td></tr
><tr id="gr_svn3_402"

><td id="402"><a href="#402">402</a></td></tr
><tr id="gr_svn3_403"

><td id="403"><a href="#403">403</a></td></tr
><tr id="gr_svn3_404"

><td id="404"><a href="#404">404</a></td></tr
><tr id="gr_svn3_405"

><td id="405"><a href="#405">405</a></td></tr
><tr id="gr_svn3_406"

><td id="406"><a href="#406">406</a></td></tr
><tr id="gr_svn3_407"

><td id="407"><a href="#407">407</a></td></tr
><tr id="gr_svn3_408"

><td id="408"><a href="#408">408</a></td></tr
><tr id="gr_svn3_409"

><td id="409"><a href="#409">409</a></td></tr
><tr id="gr_svn3_410"

><td id="410"><a href="#410">410</a></td></tr
><tr id="gr_svn3_411"

><td id="411"><a href="#411">411</a></td></tr
><tr id="gr_svn3_412"

><td id="412"><a href="#412">412</a></td></tr
><tr id="gr_svn3_413"

><td id="413"><a href="#413">413</a></td></tr
><tr id="gr_svn3_414"

><td id="414"><a href="#414">414</a></td></tr
><tr id="gr_svn3_415"

><td id="415"><a href="#415">415</a></td></tr
><tr id="gr_svn3_416"

><td id="416"><a href="#416">416</a></td></tr
><tr id="gr_svn3_417"

><td id="417"><a href="#417">417</a></td></tr
><tr id="gr_svn3_418"

><td id="418"><a href="#418">418</a></td></tr
><tr id="gr_svn3_419"

><td id="419"><a href="#419">419</a></td></tr
><tr id="gr_svn3_420"

><td id="420"><a href="#420">420</a></td></tr
><tr id="gr_svn3_421"

><td id="421"><a href="#421">421</a></td></tr
><tr id="gr_svn3_422"

><td id="422"><a href="#422">422</a></td></tr
><tr id="gr_svn3_423"

><td id="423"><a href="#423">423</a></td></tr
><tr id="gr_svn3_424"

><td id="424"><a href="#424">424</a></td></tr
><tr id="gr_svn3_425"

><td id="425"><a href="#425">425</a></td></tr
><tr id="gr_svn3_426"

><td id="426"><a href="#426">426</a></td></tr
><tr id="gr_svn3_427"

><td id="427"><a href="#427">427</a></td></tr
><tr id="gr_svn3_428"

><td id="428"><a href="#428">428</a></td></tr
><tr id="gr_svn3_429"

><td id="429"><a href="#429">429</a></td></tr
><tr id="gr_svn3_430"

><td id="430"><a href="#430">430</a></td></tr
><tr id="gr_svn3_431"

><td id="431"><a href="#431">431</a></td></tr
><tr id="gr_svn3_432"

><td id="432"><a href="#432">432</a></td></tr
><tr id="gr_svn3_433"

><td id="433"><a href="#433">433</a></td></tr
><tr id="gr_svn3_434"

><td id="434"><a href="#434">434</a></td></tr
><tr id="gr_svn3_435"

><td id="435"><a href="#435">435</a></td></tr
><tr id="gr_svn3_436"

><td id="436"><a href="#436">436</a></td></tr
><tr id="gr_svn3_437"

><td id="437"><a href="#437">437</a></td></tr
><tr id="gr_svn3_438"

><td id="438"><a href="#438">438</a></td></tr
><tr id="gr_svn3_439"

><td id="439"><a href="#439">439</a></td></tr
><tr id="gr_svn3_440"

><td id="440"><a href="#440">440</a></td></tr
><tr id="gr_svn3_441"

><td id="441"><a href="#441">441</a></td></tr
><tr id="gr_svn3_442"

><td id="442"><a href="#442">442</a></td></tr
><tr id="gr_svn3_443"

><td id="443"><a href="#443">443</a></td></tr
><tr id="gr_svn3_444"

><td id="444"><a href="#444">444</a></td></tr
><tr id="gr_svn3_445"

><td id="445"><a href="#445">445</a></td></tr
><tr id="gr_svn3_446"

><td id="446"><a href="#446">446</a></td></tr
><tr id="gr_svn3_447"

><td id="447"><a href="#447">447</a></td></tr
><tr id="gr_svn3_448"

><td id="448"><a href="#448">448</a></td></tr
><tr id="gr_svn3_449"

><td id="449"><a href="#449">449</a></td></tr
><tr id="gr_svn3_450"

><td id="450"><a href="#450">450</a></td></tr
><tr id="gr_svn3_451"

><td id="451"><a href="#451">451</a></td></tr
><tr id="gr_svn3_452"

><td id="452"><a href="#452">452</a></td></tr
><tr id="gr_svn3_453"

><td id="453"><a href="#453">453</a></td></tr
><tr id="gr_svn3_454"

><td id="454"><a href="#454">454</a></td></tr
><tr id="gr_svn3_455"

><td id="455"><a href="#455">455</a></td></tr
><tr id="gr_svn3_456"

><td id="456"><a href="#456">456</a></td></tr
><tr id="gr_svn3_457"

><td id="457"><a href="#457">457</a></td></tr
><tr id="gr_svn3_458"

><td id="458"><a href="#458">458</a></td></tr
><tr id="gr_svn3_459"

><td id="459"><a href="#459">459</a></td></tr
><tr id="gr_svn3_460"

><td id="460"><a href="#460">460</a></td></tr
><tr id="gr_svn3_461"

><td id="461"><a href="#461">461</a></td></tr
><tr id="gr_svn3_462"

><td id="462"><a href="#462">462</a></td></tr
><tr id="gr_svn3_463"

><td id="463"><a href="#463">463</a></td></tr
><tr id="gr_svn3_464"

><td id="464"><a href="#464">464</a></td></tr
><tr id="gr_svn3_465"

><td id="465"><a href="#465">465</a></td></tr
><tr id="gr_svn3_466"

><td id="466"><a href="#466">466</a></td></tr
><tr id="gr_svn3_467"

><td id="467"><a href="#467">467</a></td></tr
><tr id="gr_svn3_468"

><td id="468"><a href="#468">468</a></td></tr
><tr id="gr_svn3_469"

><td id="469"><a href="#469">469</a></td></tr
><tr id="gr_svn3_470"

><td id="470"><a href="#470">470</a></td></tr
><tr id="gr_svn3_471"

><td id="471"><a href="#471">471</a></td></tr
><tr id="gr_svn3_472"

><td id="472"><a href="#472">472</a></td></tr
><tr id="gr_svn3_473"

><td id="473"><a href="#473">473</a></td></tr
><tr id="gr_svn3_474"

><td id="474"><a href="#474">474</a></td></tr
><tr id="gr_svn3_475"

><td id="475"><a href="#475">475</a></td></tr
><tr id="gr_svn3_476"

><td id="476"><a href="#476">476</a></td></tr
><tr id="gr_svn3_477"

><td id="477"><a href="#477">477</a></td></tr
><tr id="gr_svn3_478"

><td id="478"><a href="#478">478</a></td></tr
><tr id="gr_svn3_479"

><td id="479"><a href="#479">479</a></td></tr
><tr id="gr_svn3_480"

><td id="480"><a href="#480">480</a></td></tr
><tr id="gr_svn3_481"

><td id="481"><a href="#481">481</a></td></tr
><tr id="gr_svn3_482"

><td id="482"><a href="#482">482</a></td></tr
><tr id="gr_svn3_483"

><td id="483"><a href="#483">483</a></td></tr
><tr id="gr_svn3_484"

><td id="484"><a href="#484">484</a></td></tr
><tr id="gr_svn3_485"

><td id="485"><a href="#485">485</a></td></tr
><tr id="gr_svn3_486"

><td id="486"><a href="#486">486</a></td></tr
><tr id="gr_svn3_487"

><td id="487"><a href="#487">487</a></td></tr
><tr id="gr_svn3_488"

><td id="488"><a href="#488">488</a></td></tr
><tr id="gr_svn3_489"

><td id="489"><a href="#489">489</a></td></tr
><tr id="gr_svn3_490"

><td id="490"><a href="#490">490</a></td></tr
><tr id="gr_svn3_491"

><td id="491"><a href="#491">491</a></td></tr
><tr id="gr_svn3_492"

><td id="492"><a href="#492">492</a></td></tr
><tr id="gr_svn3_493"

><td id="493"><a href="#493">493</a></td></tr
><tr id="gr_svn3_494"

><td id="494"><a href="#494">494</a></td></tr
><tr id="gr_svn3_495"

><td id="495"><a href="#495">495</a></td></tr
><tr id="gr_svn3_496"

><td id="496"><a href="#496">496</a></td></tr
><tr id="gr_svn3_497"

><td id="497"><a href="#497">497</a></td></tr
><tr id="gr_svn3_498"

><td id="498"><a href="#498">498</a></td></tr
><tr id="gr_svn3_499"

><td id="499"><a href="#499">499</a></td></tr
><tr id="gr_svn3_500"

><td id="500"><a href="#500">500</a></td></tr
><tr id="gr_svn3_501"

><td id="501"><a href="#501">501</a></td></tr
><tr id="gr_svn3_502"

><td id="502"><a href="#502">502</a></td></tr
><tr id="gr_svn3_503"

><td id="503"><a href="#503">503</a></td></tr
><tr id="gr_svn3_504"

><td id="504"><a href="#504">504</a></td></tr
><tr id="gr_svn3_505"

><td id="505"><a href="#505">505</a></td></tr
><tr id="gr_svn3_506"

><td id="506"><a href="#506">506</a></td></tr
><tr id="gr_svn3_507"

><td id="507"><a href="#507">507</a></td></tr
><tr id="gr_svn3_508"

><td id="508"><a href="#508">508</a></td></tr
><tr id="gr_svn3_509"

><td id="509"><a href="#509">509</a></td></tr
><tr id="gr_svn3_510"

><td id="510"><a href="#510">510</a></td></tr
><tr id="gr_svn3_511"

><td id="511"><a href="#511">511</a></td></tr
><tr id="gr_svn3_512"

><td id="512"><a href="#512">512</a></td></tr
><tr id="gr_svn3_513"

><td id="513"><a href="#513">513</a></td></tr
><tr id="gr_svn3_514"

><td id="514"><a href="#514">514</a></td></tr
><tr id="gr_svn3_515"

><td id="515"><a href="#515">515</a></td></tr
><tr id="gr_svn3_516"

><td id="516"><a href="#516">516</a></td></tr
><tr id="gr_svn3_517"

><td id="517"><a href="#517">517</a></td></tr
><tr id="gr_svn3_518"

><td id="518"><a href="#518">518</a></td></tr
><tr id="gr_svn3_519"

><td id="519"><a href="#519">519</a></td></tr
><tr id="gr_svn3_520"

><td id="520"><a href="#520">520</a></td></tr
><tr id="gr_svn3_521"

><td id="521"><a href="#521">521</a></td></tr
><tr id="gr_svn3_522"

><td id="522"><a href="#522">522</a></td></tr
><tr id="gr_svn3_523"

><td id="523"><a href="#523">523</a></td></tr
><tr id="gr_svn3_524"

><td id="524"><a href="#524">524</a></td></tr
><tr id="gr_svn3_525"

><td id="525"><a href="#525">525</a></td></tr
><tr id="gr_svn3_526"

><td id="526"><a href="#526">526</a></td></tr
><tr id="gr_svn3_527"

><td id="527"><a href="#527">527</a></td></tr
><tr id="gr_svn3_528"

><td id="528"><a href="#528">528</a></td></tr
><tr id="gr_svn3_529"

><td id="529"><a href="#529">529</a></td></tr
><tr id="gr_svn3_530"

><td id="530"><a href="#530">530</a></td></tr
><tr id="gr_svn3_531"

><td id="531"><a href="#531">531</a></td></tr
><tr id="gr_svn3_532"

><td id="532"><a href="#532">532</a></td></tr
><tr id="gr_svn3_533"

><td id="533"><a href="#533">533</a></td></tr
><tr id="gr_svn3_534"

><td id="534"><a href="#534">534</a></td></tr
><tr id="gr_svn3_535"

><td id="535"><a href="#535">535</a></td></tr
><tr id="gr_svn3_536"

><td id="536"><a href="#536">536</a></td></tr
><tr id="gr_svn3_537"

><td id="537"><a href="#537">537</a></td></tr
><tr id="gr_svn3_538"

><td id="538"><a href="#538">538</a></td></tr
><tr id="gr_svn3_539"

><td id="539"><a href="#539">539</a></td></tr
><tr id="gr_svn3_540"

><td id="540"><a href="#540">540</a></td></tr
><tr id="gr_svn3_541"

><td id="541"><a href="#541">541</a></td></tr
><tr id="gr_svn3_542"

><td id="542"><a href="#542">542</a></td></tr
><tr id="gr_svn3_543"

><td id="543"><a href="#543">543</a></td></tr
><tr id="gr_svn3_544"

><td id="544"><a href="#544">544</a></td></tr
><tr id="gr_svn3_545"

><td id="545"><a href="#545">545</a></td></tr
><tr id="gr_svn3_546"

><td id="546"><a href="#546">546</a></td></tr
><tr id="gr_svn3_547"

><td id="547"><a href="#547">547</a></td></tr
><tr id="gr_svn3_548"

><td id="548"><a href="#548">548</a></td></tr
><tr id="gr_svn3_549"

><td id="549"><a href="#549">549</a></td></tr
><tr id="gr_svn3_550"

><td id="550"><a href="#550">550</a></td></tr
><tr id="gr_svn3_551"

><td id="551"><a href="#551">551</a></td></tr
><tr id="gr_svn3_552"

><td id="552"><a href="#552">552</a></td></tr
><tr id="gr_svn3_553"

><td id="553"><a href="#553">553</a></td></tr
><tr id="gr_svn3_554"

><td id="554"><a href="#554">554</a></td></tr
><tr id="gr_svn3_555"

><td id="555"><a href="#555">555</a></td></tr
><tr id="gr_svn3_556"

><td id="556"><a href="#556">556</a></td></tr
><tr id="gr_svn3_557"

><td id="557"><a href="#557">557</a></td></tr
><tr id="gr_svn3_558"

><td id="558"><a href="#558">558</a></td></tr
><tr id="gr_svn3_559"

><td id="559"><a href="#559">559</a></td></tr
><tr id="gr_svn3_560"

><td id="560"><a href="#560">560</a></td></tr
><tr id="gr_svn3_561"

><td id="561"><a href="#561">561</a></td></tr
><tr id="gr_svn3_562"

><td id="562"><a href="#562">562</a></td></tr
><tr id="gr_svn3_563"

><td id="563"><a href="#563">563</a></td></tr
><tr id="gr_svn3_564"

><td id="564"><a href="#564">564</a></td></tr
><tr id="gr_svn3_565"

><td id="565"><a href="#565">565</a></td></tr
><tr id="gr_svn3_566"

><td id="566"><a href="#566">566</a></td></tr
><tr id="gr_svn3_567"

><td id="567"><a href="#567">567</a></td></tr
><tr id="gr_svn3_568"

><td id="568"><a href="#568">568</a></td></tr
><tr id="gr_svn3_569"

><td id="569"><a href="#569">569</a></td></tr
><tr id="gr_svn3_570"

><td id="570"><a href="#570">570</a></td></tr
><tr id="gr_svn3_571"

><td id="571"><a href="#571">571</a></td></tr
><tr id="gr_svn3_572"

><td id="572"><a href="#572">572</a></td></tr
><tr id="gr_svn3_573"

><td id="573"><a href="#573">573</a></td></tr
><tr id="gr_svn3_574"

><td id="574"><a href="#574">574</a></td></tr
><tr id="gr_svn3_575"

><td id="575"><a href="#575">575</a></td></tr
><tr id="gr_svn3_576"

><td id="576"><a href="#576">576</a></td></tr
><tr id="gr_svn3_577"

><td id="577"><a href="#577">577</a></td></tr
><tr id="gr_svn3_578"

><td id="578"><a href="#578">578</a></td></tr
><tr id="gr_svn3_579"

><td id="579"><a href="#579">579</a></td></tr
><tr id="gr_svn3_580"

><td id="580"><a href="#580">580</a></td></tr
><tr id="gr_svn3_581"

><td id="581"><a href="#581">581</a></td></tr
><tr id="gr_svn3_582"

><td id="582"><a href="#582">582</a></td></tr
><tr id="gr_svn3_583"

><td id="583"><a href="#583">583</a></td></tr
><tr id="gr_svn3_584"

><td id="584"><a href="#584">584</a></td></tr
><tr id="gr_svn3_585"

><td id="585"><a href="#585">585</a></td></tr
><tr id="gr_svn3_586"

><td id="586"><a href="#586">586</a></td></tr
><tr id="gr_svn3_587"

><td id="587"><a href="#587">587</a></td></tr
><tr id="gr_svn3_588"

><td id="588"><a href="#588">588</a></td></tr
><tr id="gr_svn3_589"

><td id="589"><a href="#589">589</a></td></tr
><tr id="gr_svn3_590"

><td id="590"><a href="#590">590</a></td></tr
><tr id="gr_svn3_591"

><td id="591"><a href="#591">591</a></td></tr
><tr id="gr_svn3_592"

><td id="592"><a href="#592">592</a></td></tr
><tr id="gr_svn3_593"

><td id="593"><a href="#593">593</a></td></tr
><tr id="gr_svn3_594"

><td id="594"><a href="#594">594</a></td></tr
><tr id="gr_svn3_595"

><td id="595"><a href="#595">595</a></td></tr
><tr id="gr_svn3_596"

><td id="596"><a href="#596">596</a></td></tr
><tr id="gr_svn3_597"

><td id="597"><a href="#597">597</a></td></tr
><tr id="gr_svn3_598"

><td id="598"><a href="#598">598</a></td></tr
><tr id="gr_svn3_599"

><td id="599"><a href="#599">599</a></td></tr
><tr id="gr_svn3_600"

><td id="600"><a href="#600">600</a></td></tr
><tr id="gr_svn3_601"

><td id="601"><a href="#601">601</a></td></tr
><tr id="gr_svn3_602"

><td id="602"><a href="#602">602</a></td></tr
><tr id="gr_svn3_603"

><td id="603"><a href="#603">603</a></td></tr
><tr id="gr_svn3_604"

><td id="604"><a href="#604">604</a></td></tr
><tr id="gr_svn3_605"

><td id="605"><a href="#605">605</a></td></tr
><tr id="gr_svn3_606"

><td id="606"><a href="#606">606</a></td></tr
><tr id="gr_svn3_607"

><td id="607"><a href="#607">607</a></td></tr
><tr id="gr_svn3_608"

><td id="608"><a href="#608">608</a></td></tr
><tr id="gr_svn3_609"

><td id="609"><a href="#609">609</a></td></tr
><tr id="gr_svn3_610"

><td id="610"><a href="#610">610</a></td></tr
><tr id="gr_svn3_611"

><td id="611"><a href="#611">611</a></td></tr
><tr id="gr_svn3_612"

><td id="612"><a href="#612">612</a></td></tr
><tr id="gr_svn3_613"

><td id="613"><a href="#613">613</a></td></tr
><tr id="gr_svn3_614"

><td id="614"><a href="#614">614</a></td></tr
><tr id="gr_svn3_615"

><td id="615"><a href="#615">615</a></td></tr
><tr id="gr_svn3_616"

><td id="616"><a href="#616">616</a></td></tr
><tr id="gr_svn3_617"

><td id="617"><a href="#617">617</a></td></tr
><tr id="gr_svn3_618"

><td id="618"><a href="#618">618</a></td></tr
><tr id="gr_svn3_619"

><td id="619"><a href="#619">619</a></td></tr
><tr id="gr_svn3_620"

><td id="620"><a href="#620">620</a></td></tr
><tr id="gr_svn3_621"

><td id="621"><a href="#621">621</a></td></tr
><tr id="gr_svn3_622"

><td id="622"><a href="#622">622</a></td></tr
><tr id="gr_svn3_623"

><td id="623"><a href="#623">623</a></td></tr
><tr id="gr_svn3_624"

><td id="624"><a href="#624">624</a></td></tr
><tr id="gr_svn3_625"

><td id="625"><a href="#625">625</a></td></tr
><tr id="gr_svn3_626"

><td id="626"><a href="#626">626</a></td></tr
><tr id="gr_svn3_627"

><td id="627"><a href="#627">627</a></td></tr
><tr id="gr_svn3_628"

><td id="628"><a href="#628">628</a></td></tr
><tr id="gr_svn3_629"

><td id="629"><a href="#629">629</a></td></tr
><tr id="gr_svn3_630"

><td id="630"><a href="#630">630</a></td></tr
><tr id="gr_svn3_631"

><td id="631"><a href="#631">631</a></td></tr
><tr id="gr_svn3_632"

><td id="632"><a href="#632">632</a></td></tr
><tr id="gr_svn3_633"

><td id="633"><a href="#633">633</a></td></tr
><tr id="gr_svn3_634"

><td id="634"><a href="#634">634</a></td></tr
><tr id="gr_svn3_635"

><td id="635"><a href="#635">635</a></td></tr
><tr id="gr_svn3_636"

><td id="636"><a href="#636">636</a></td></tr
><tr id="gr_svn3_637"

><td id="637"><a href="#637">637</a></td></tr
><tr id="gr_svn3_638"

><td id="638"><a href="#638">638</a></td></tr
><tr id="gr_svn3_639"

><td id="639"><a href="#639">639</a></td></tr
><tr id="gr_svn3_640"

><td id="640"><a href="#640">640</a></td></tr
><tr id="gr_svn3_641"

><td id="641"><a href="#641">641</a></td></tr
><tr id="gr_svn3_642"

><td id="642"><a href="#642">642</a></td></tr
><tr id="gr_svn3_643"

><td id="643"><a href="#643">643</a></td></tr
><tr id="gr_svn3_644"

><td id="644"><a href="#644">644</a></td></tr
><tr id="gr_svn3_645"

><td id="645"><a href="#645">645</a></td></tr
><tr id="gr_svn3_646"

><td id="646"><a href="#646">646</a></td></tr
><tr id="gr_svn3_647"

><td id="647"><a href="#647">647</a></td></tr
><tr id="gr_svn3_648"

><td id="648"><a href="#648">648</a></td></tr
><tr id="gr_svn3_649"

><td id="649"><a href="#649">649</a></td></tr
><tr id="gr_svn3_650"

><td id="650"><a href="#650">650</a></td></tr
><tr id="gr_svn3_651"

><td id="651"><a href="#651">651</a></td></tr
><tr id="gr_svn3_652"

><td id="652"><a href="#652">652</a></td></tr
><tr id="gr_svn3_653"

><td id="653"><a href="#653">653</a></td></tr
><tr id="gr_svn3_654"

><td id="654"><a href="#654">654</a></td></tr
><tr id="gr_svn3_655"

><td id="655"><a href="#655">655</a></td></tr
><tr id="gr_svn3_656"

><td id="656"><a href="#656">656</a></td></tr
><tr id="gr_svn3_657"

><td id="657"><a href="#657">657</a></td></tr
><tr id="gr_svn3_658"

><td id="658"><a href="#658">658</a></td></tr
><tr id="gr_svn3_659"

><td id="659"><a href="#659">659</a></td></tr
><tr id="gr_svn3_660"

><td id="660"><a href="#660">660</a></td></tr
><tr id="gr_svn3_661"

><td id="661"><a href="#661">661</a></td></tr
><tr id="gr_svn3_662"

><td id="662"><a href="#662">662</a></td></tr
><tr id="gr_svn3_663"

><td id="663"><a href="#663">663</a></td></tr
><tr id="gr_svn3_664"

><td id="664"><a href="#664">664</a></td></tr
><tr id="gr_svn3_665"

><td id="665"><a href="#665">665</a></td></tr
><tr id="gr_svn3_666"

><td id="666"><a href="#666">666</a></td></tr
><tr id="gr_svn3_667"

><td id="667"><a href="#667">667</a></td></tr
><tr id="gr_svn3_668"

><td id="668"><a href="#668">668</a></td></tr
><tr id="gr_svn3_669"

><td id="669"><a href="#669">669</a></td></tr
><tr id="gr_svn3_670"

><td id="670"><a href="#670">670</a></td></tr
><tr id="gr_svn3_671"

><td id="671"><a href="#671">671</a></td></tr
><tr id="gr_svn3_672"

><td id="672"><a href="#672">672</a></td></tr
><tr id="gr_svn3_673"

><td id="673"><a href="#673">673</a></td></tr
><tr id="gr_svn3_674"

><td id="674"><a href="#674">674</a></td></tr
><tr id="gr_svn3_675"

><td id="675"><a href="#675">675</a></td></tr
><tr id="gr_svn3_676"

><td id="676"><a href="#676">676</a></td></tr
><tr id="gr_svn3_677"

><td id="677"><a href="#677">677</a></td></tr
><tr id="gr_svn3_678"

><td id="678"><a href="#678">678</a></td></tr
><tr id="gr_svn3_679"

><td id="679"><a href="#679">679</a></td></tr
><tr id="gr_svn3_680"

><td id="680"><a href="#680">680</a></td></tr
><tr id="gr_svn3_681"

><td id="681"><a href="#681">681</a></td></tr
><tr id="gr_svn3_682"

><td id="682"><a href="#682">682</a></td></tr
><tr id="gr_svn3_683"

><td id="683"><a href="#683">683</a></td></tr
><tr id="gr_svn3_684"

><td id="684"><a href="#684">684</a></td></tr
><tr id="gr_svn3_685"

><td id="685"><a href="#685">685</a></td></tr
><tr id="gr_svn3_686"

><td id="686"><a href="#686">686</a></td></tr
><tr id="gr_svn3_687"

><td id="687"><a href="#687">687</a></td></tr
><tr id="gr_svn3_688"

><td id="688"><a href="#688">688</a></td></tr
><tr id="gr_svn3_689"

><td id="689"><a href="#689">689</a></td></tr
><tr id="gr_svn3_690"

><td id="690"><a href="#690">690</a></td></tr
><tr id="gr_svn3_691"

><td id="691"><a href="#691">691</a></td></tr
><tr id="gr_svn3_692"

><td id="692"><a href="#692">692</a></td></tr
><tr id="gr_svn3_693"

><td id="693"><a href="#693">693</a></td></tr
><tr id="gr_svn3_694"

><td id="694"><a href="#694">694</a></td></tr
><tr id="gr_svn3_695"

><td id="695"><a href="#695">695</a></td></tr
><tr id="gr_svn3_696"

><td id="696"><a href="#696">696</a></td></tr
><tr id="gr_svn3_697"

><td id="697"><a href="#697">697</a></td></tr
><tr id="gr_svn3_698"

><td id="698"><a href="#698">698</a></td></tr
><tr id="gr_svn3_699"

><td id="699"><a href="#699">699</a></td></tr
><tr id="gr_svn3_700"

><td id="700"><a href="#700">700</a></td></tr
><tr id="gr_svn3_701"

><td id="701"><a href="#701">701</a></td></tr
><tr id="gr_svn3_702"

><td id="702"><a href="#702">702</a></td></tr
><tr id="gr_svn3_703"

><td id="703"><a href="#703">703</a></td></tr
><tr id="gr_svn3_704"

><td id="704"><a href="#704">704</a></td></tr
><tr id="gr_svn3_705"

><td id="705"><a href="#705">705</a></td></tr
><tr id="gr_svn3_706"

><td id="706"><a href="#706">706</a></td></tr
><tr id="gr_svn3_707"

><td id="707"><a href="#707">707</a></td></tr
><tr id="gr_svn3_708"

><td id="708"><a href="#708">708</a></td></tr
><tr id="gr_svn3_709"

><td id="709"><a href="#709">709</a></td></tr
><tr id="gr_svn3_710"

><td id="710"><a href="#710">710</a></td></tr
><tr id="gr_svn3_711"

><td id="711"><a href="#711">711</a></td></tr
><tr id="gr_svn3_712"

><td id="712"><a href="#712">712</a></td></tr
><tr id="gr_svn3_713"

><td id="713"><a href="#713">713</a></td></tr
><tr id="gr_svn3_714"

><td id="714"><a href="#714">714</a></td></tr
><tr id="gr_svn3_715"

><td id="715"><a href="#715">715</a></td></tr
><tr id="gr_svn3_716"

><td id="716"><a href="#716">716</a></td></tr
><tr id="gr_svn3_717"

><td id="717"><a href="#717">717</a></td></tr
><tr id="gr_svn3_718"

><td id="718"><a href="#718">718</a></td></tr
><tr id="gr_svn3_719"

><td id="719"><a href="#719">719</a></td></tr
><tr id="gr_svn3_720"

><td id="720"><a href="#720">720</a></td></tr
><tr id="gr_svn3_721"

><td id="721"><a href="#721">721</a></td></tr
><tr id="gr_svn3_722"

><td id="722"><a href="#722">722</a></td></tr
><tr id="gr_svn3_723"

><td id="723"><a href="#723">723</a></td></tr
><tr id="gr_svn3_724"

><td id="724"><a href="#724">724</a></td></tr
><tr id="gr_svn3_725"

><td id="725"><a href="#725">725</a></td></tr
><tr id="gr_svn3_726"

><td id="726"><a href="#726">726</a></td></tr
><tr id="gr_svn3_727"

><td id="727"><a href="#727">727</a></td></tr
><tr id="gr_svn3_728"

><td id="728"><a href="#728">728</a></td></tr
><tr id="gr_svn3_729"

><td id="729"><a href="#729">729</a></td></tr
><tr id="gr_svn3_730"

><td id="730"><a href="#730">730</a></td></tr
><tr id="gr_svn3_731"

><td id="731"><a href="#731">731</a></td></tr
><tr id="gr_svn3_732"

><td id="732"><a href="#732">732</a></td></tr
><tr id="gr_svn3_733"

><td id="733"><a href="#733">733</a></td></tr
><tr id="gr_svn3_734"

><td id="734"><a href="#734">734</a></td></tr
><tr id="gr_svn3_735"

><td id="735"><a href="#735">735</a></td></tr
><tr id="gr_svn3_736"

><td id="736"><a href="#736">736</a></td></tr
><tr id="gr_svn3_737"

><td id="737"><a href="#737">737</a></td></tr
><tr id="gr_svn3_738"

><td id="738"><a href="#738">738</a></td></tr
><tr id="gr_svn3_739"

><td id="739"><a href="#739">739</a></td></tr
><tr id="gr_svn3_740"

><td id="740"><a href="#740">740</a></td></tr
><tr id="gr_svn3_741"

><td id="741"><a href="#741">741</a></td></tr
><tr id="gr_svn3_742"

><td id="742"><a href="#742">742</a></td></tr
><tr id="gr_svn3_743"

><td id="743"><a href="#743">743</a></td></tr
><tr id="gr_svn3_744"

><td id="744"><a href="#744">744</a></td></tr
><tr id="gr_svn3_745"

><td id="745"><a href="#745">745</a></td></tr
><tr id="gr_svn3_746"

><td id="746"><a href="#746">746</a></td></tr
><tr id="gr_svn3_747"

><td id="747"><a href="#747">747</a></td></tr
><tr id="gr_svn3_748"

><td id="748"><a href="#748">748</a></td></tr
><tr id="gr_svn3_749"

><td id="749"><a href="#749">749</a></td></tr
><tr id="gr_svn3_750"

><td id="750"><a href="#750">750</a></td></tr
><tr id="gr_svn3_751"

><td id="751"><a href="#751">751</a></td></tr
><tr id="gr_svn3_752"

><td id="752"><a href="#752">752</a></td></tr
><tr id="gr_svn3_753"

><td id="753"><a href="#753">753</a></td></tr
><tr id="gr_svn3_754"

><td id="754"><a href="#754">754</a></td></tr
><tr id="gr_svn3_755"

><td id="755"><a href="#755">755</a></td></tr
><tr id="gr_svn3_756"

><td id="756"><a href="#756">756</a></td></tr
><tr id="gr_svn3_757"

><td id="757"><a href="#757">757</a></td></tr
><tr id="gr_svn3_758"

><td id="758"><a href="#758">758</a></td></tr
><tr id="gr_svn3_759"

><td id="759"><a href="#759">759</a></td></tr
><tr id="gr_svn3_760"

><td id="760"><a href="#760">760</a></td></tr
><tr id="gr_svn3_761"

><td id="761"><a href="#761">761</a></td></tr
><tr id="gr_svn3_762"

><td id="762"><a href="#762">762</a></td></tr
><tr id="gr_svn3_763"

><td id="763"><a href="#763">763</a></td></tr
><tr id="gr_svn3_764"

><td id="764"><a href="#764">764</a></td></tr
><tr id="gr_svn3_765"

><td id="765"><a href="#765">765</a></td></tr
><tr id="gr_svn3_766"

><td id="766"><a href="#766">766</a></td></tr
><tr id="gr_svn3_767"

><td id="767"><a href="#767">767</a></td></tr
><tr id="gr_svn3_768"

><td id="768"><a href="#768">768</a></td></tr
><tr id="gr_svn3_769"

><td id="769"><a href="#769">769</a></td></tr
><tr id="gr_svn3_770"

><td id="770"><a href="#770">770</a></td></tr
><tr id="gr_svn3_771"

><td id="771"><a href="#771">771</a></td></tr
><tr id="gr_svn3_772"

><td id="772"><a href="#772">772</a></td></tr
><tr id="gr_svn3_773"

><td id="773"><a href="#773">773</a></td></tr
><tr id="gr_svn3_774"

><td id="774"><a href="#774">774</a></td></tr
><tr id="gr_svn3_775"

><td id="775"><a href="#775">775</a></td></tr
><tr id="gr_svn3_776"

><td id="776"><a href="#776">776</a></td></tr
><tr id="gr_svn3_777"

><td id="777"><a href="#777">777</a></td></tr
><tr id="gr_svn3_778"

><td id="778"><a href="#778">778</a></td></tr
><tr id="gr_svn3_779"

><td id="779"><a href="#779">779</a></td></tr
><tr id="gr_svn3_780"

><td id="780"><a href="#780">780</a></td></tr
><tr id="gr_svn3_781"

><td id="781"><a href="#781">781</a></td></tr
><tr id="gr_svn3_782"

><td id="782"><a href="#782">782</a></td></tr
><tr id="gr_svn3_783"

><td id="783"><a href="#783">783</a></td></tr
><tr id="gr_svn3_784"

><td id="784"><a href="#784">784</a></td></tr
><tr id="gr_svn3_785"

><td id="785"><a href="#785">785</a></td></tr
><tr id="gr_svn3_786"

><td id="786"><a href="#786">786</a></td></tr
><tr id="gr_svn3_787"

><td id="787"><a href="#787">787</a></td></tr
><tr id="gr_svn3_788"

><td id="788"><a href="#788">788</a></td></tr
><tr id="gr_svn3_789"

><td id="789"><a href="#789">789</a></td></tr
><tr id="gr_svn3_790"

><td id="790"><a href="#790">790</a></td></tr
><tr id="gr_svn3_791"

><td id="791"><a href="#791">791</a></td></tr
><tr id="gr_svn3_792"

><td id="792"><a href="#792">792</a></td></tr
><tr id="gr_svn3_793"

><td id="793"><a href="#793">793</a></td></tr
><tr id="gr_svn3_794"

><td id="794"><a href="#794">794</a></td></tr
><tr id="gr_svn3_795"

><td id="795"><a href="#795">795</a></td></tr
><tr id="gr_svn3_796"

><td id="796"><a href="#796">796</a></td></tr
><tr id="gr_svn3_797"

><td id="797"><a href="#797">797</a></td></tr
><tr id="gr_svn3_798"

><td id="798"><a href="#798">798</a></td></tr
><tr id="gr_svn3_799"

><td id="799"><a href="#799">799</a></td></tr
><tr id="gr_svn3_800"

><td id="800"><a href="#800">800</a></td></tr
><tr id="gr_svn3_801"

><td id="801"><a href="#801">801</a></td></tr
><tr id="gr_svn3_802"

><td id="802"><a href="#802">802</a></td></tr
><tr id="gr_svn3_803"

><td id="803"><a href="#803">803</a></td></tr
><tr id="gr_svn3_804"

><td id="804"><a href="#804">804</a></td></tr
><tr id="gr_svn3_805"

><td id="805"><a href="#805">805</a></td></tr
><tr id="gr_svn3_806"

><td id="806"><a href="#806">806</a></td></tr
><tr id="gr_svn3_807"

><td id="807"><a href="#807">807</a></td></tr
><tr id="gr_svn3_808"

><td id="808"><a href="#808">808</a></td></tr
><tr id="gr_svn3_809"

><td id="809"><a href="#809">809</a></td></tr
><tr id="gr_svn3_810"

><td id="810"><a href="#810">810</a></td></tr
><tr id="gr_svn3_811"

><td id="811"><a href="#811">811</a></td></tr
><tr id="gr_svn3_812"

><td id="812"><a href="#812">812</a></td></tr
><tr id="gr_svn3_813"

><td id="813"><a href="#813">813</a></td></tr
><tr id="gr_svn3_814"

><td id="814"><a href="#814">814</a></td></tr
><tr id="gr_svn3_815"

><td id="815"><a href="#815">815</a></td></tr
><tr id="gr_svn3_816"

><td id="816"><a href="#816">816</a></td></tr
><tr id="gr_svn3_817"

><td id="817"><a href="#817">817</a></td></tr
><tr id="gr_svn3_818"

><td id="818"><a href="#818">818</a></td></tr
><tr id="gr_svn3_819"

><td id="819"><a href="#819">819</a></td></tr
><tr id="gr_svn3_820"

><td id="820"><a href="#820">820</a></td></tr
><tr id="gr_svn3_821"

><td id="821"><a href="#821">821</a></td></tr
><tr id="gr_svn3_822"

><td id="822"><a href="#822">822</a></td></tr
><tr id="gr_svn3_823"

><td id="823"><a href="#823">823</a></td></tr
><tr id="gr_svn3_824"

><td id="824"><a href="#824">824</a></td></tr
><tr id="gr_svn3_825"

><td id="825"><a href="#825">825</a></td></tr
><tr id="gr_svn3_826"

><td id="826"><a href="#826">826</a></td></tr
><tr id="gr_svn3_827"

><td id="827"><a href="#827">827</a></td></tr
><tr id="gr_svn3_828"

><td id="828"><a href="#828">828</a></td></tr
><tr id="gr_svn3_829"

><td id="829"><a href="#829">829</a></td></tr
><tr id="gr_svn3_830"

><td id="830"><a href="#830">830</a></td></tr
><tr id="gr_svn3_831"

><td id="831"><a href="#831">831</a></td></tr
><tr id="gr_svn3_832"

><td id="832"><a href="#832">832</a></td></tr
><tr id="gr_svn3_833"

><td id="833"><a href="#833">833</a></td></tr
><tr id="gr_svn3_834"

><td id="834"><a href="#834">834</a></td></tr
><tr id="gr_svn3_835"

><td id="835"><a href="#835">835</a></td></tr
><tr id="gr_svn3_836"

><td id="836"><a href="#836">836</a></td></tr
><tr id="gr_svn3_837"

><td id="837"><a href="#837">837</a></td></tr
><tr id="gr_svn3_838"

><td id="838"><a href="#838">838</a></td></tr
><tr id="gr_svn3_839"

><td id="839"><a href="#839">839</a></td></tr
><tr id="gr_svn3_840"

><td id="840"><a href="#840">840</a></td></tr
><tr id="gr_svn3_841"

><td id="841"><a href="#841">841</a></td></tr
><tr id="gr_svn3_842"

><td id="842"><a href="#842">842</a></td></tr
><tr id="gr_svn3_843"

><td id="843"><a href="#843">843</a></td></tr
><tr id="gr_svn3_844"

><td id="844"><a href="#844">844</a></td></tr
><tr id="gr_svn3_845"

><td id="845"><a href="#845">845</a></td></tr
><tr id="gr_svn3_846"

><td id="846"><a href="#846">846</a></td></tr
><tr id="gr_svn3_847"

><td id="847"><a href="#847">847</a></td></tr
><tr id="gr_svn3_848"

><td id="848"><a href="#848">848</a></td></tr
><tr id="gr_svn3_849"

><td id="849"><a href="#849">849</a></td></tr
><tr id="gr_svn3_850"

><td id="850"><a href="#850">850</a></td></tr
><tr id="gr_svn3_851"

><td id="851"><a href="#851">851</a></td></tr
><tr id="gr_svn3_852"

><td id="852"><a href="#852">852</a></td></tr
><tr id="gr_svn3_853"

><td id="853"><a href="#853">853</a></td></tr
><tr id="gr_svn3_854"

><td id="854"><a href="#854">854</a></td></tr
><tr id="gr_svn3_855"

><td id="855"><a href="#855">855</a></td></tr
><tr id="gr_svn3_856"

><td id="856"><a href="#856">856</a></td></tr
><tr id="gr_svn3_857"

><td id="857"><a href="#857">857</a></td></tr
><tr id="gr_svn3_858"

><td id="858"><a href="#858">858</a></td></tr
><tr id="gr_svn3_859"

><td id="859"><a href="#859">859</a></td></tr
><tr id="gr_svn3_860"

><td id="860"><a href="#860">860</a></td></tr
><tr id="gr_svn3_861"

><td id="861"><a href="#861">861</a></td></tr
><tr id="gr_svn3_862"

><td id="862"><a href="#862">862</a></td></tr
><tr id="gr_svn3_863"

><td id="863"><a href="#863">863</a></td></tr
><tr id="gr_svn3_864"

><td id="864"><a href="#864">864</a></td></tr
><tr id="gr_svn3_865"

><td id="865"><a href="#865">865</a></td></tr
><tr id="gr_svn3_866"

><td id="866"><a href="#866">866</a></td></tr
><tr id="gr_svn3_867"

><td id="867"><a href="#867">867</a></td></tr
><tr id="gr_svn3_868"

><td id="868"><a href="#868">868</a></td></tr
><tr id="gr_svn3_869"

><td id="869"><a href="#869">869</a></td></tr
><tr id="gr_svn3_870"

><td id="870"><a href="#870">870</a></td></tr
><tr id="gr_svn3_871"

><td id="871"><a href="#871">871</a></td></tr
><tr id="gr_svn3_872"

><td id="872"><a href="#872">872</a></td></tr
><tr id="gr_svn3_873"

><td id="873"><a href="#873">873</a></td></tr
><tr id="gr_svn3_874"

><td id="874"><a href="#874">874</a></td></tr
><tr id="gr_svn3_875"

><td id="875"><a href="#875">875</a></td></tr
><tr id="gr_svn3_876"

><td id="876"><a href="#876">876</a></td></tr
><tr id="gr_svn3_877"

><td id="877"><a href="#877">877</a></td></tr
><tr id="gr_svn3_878"

><td id="878"><a href="#878">878</a></td></tr
><tr id="gr_svn3_879"

><td id="879"><a href="#879">879</a></td></tr
><tr id="gr_svn3_880"

><td id="880"><a href="#880">880</a></td></tr
><tr id="gr_svn3_881"

><td id="881"><a href="#881">881</a></td></tr
><tr id="gr_svn3_882"

><td id="882"><a href="#882">882</a></td></tr
><tr id="gr_svn3_883"

><td id="883"><a href="#883">883</a></td></tr
><tr id="gr_svn3_884"

><td id="884"><a href="#884">884</a></td></tr
><tr id="gr_svn3_885"

><td id="885"><a href="#885">885</a></td></tr
><tr id="gr_svn3_886"

><td id="886"><a href="#886">886</a></td></tr
><tr id="gr_svn3_887"

><td id="887"><a href="#887">887</a></td></tr
><tr id="gr_svn3_888"

><td id="888"><a href="#888">888</a></td></tr
><tr id="gr_svn3_889"

><td id="889"><a href="#889">889</a></td></tr
><tr id="gr_svn3_890"

><td id="890"><a href="#890">890</a></td></tr
><tr id="gr_svn3_891"

><td id="891"><a href="#891">891</a></td></tr
><tr id="gr_svn3_892"

><td id="892"><a href="#892">892</a></td></tr
><tr id="gr_svn3_893"

><td id="893"><a href="#893">893</a></td></tr
><tr id="gr_svn3_894"

><td id="894"><a href="#894">894</a></td></tr
><tr id="gr_svn3_895"

><td id="895"><a href="#895">895</a></td></tr
><tr id="gr_svn3_896"

><td id="896"><a href="#896">896</a></td></tr
><tr id="gr_svn3_897"

><td id="897"><a href="#897">897</a></td></tr
><tr id="gr_svn3_898"

><td id="898"><a href="#898">898</a></td></tr
><tr id="gr_svn3_899"

><td id="899"><a href="#899">899</a></td></tr
><tr id="gr_svn3_900"

><td id="900"><a href="#900">900</a></td></tr
><tr id="gr_svn3_901"

><td id="901"><a href="#901">901</a></td></tr
><tr id="gr_svn3_902"

><td id="902"><a href="#902">902</a></td></tr
><tr id="gr_svn3_903"

><td id="903"><a href="#903">903</a></td></tr
><tr id="gr_svn3_904"

><td id="904"><a href="#904">904</a></td></tr
><tr id="gr_svn3_905"

><td id="905"><a href="#905">905</a></td></tr
><tr id="gr_svn3_906"

><td id="906"><a href="#906">906</a></td></tr
><tr id="gr_svn3_907"

><td id="907"><a href="#907">907</a></td></tr
><tr id="gr_svn3_908"

><td id="908"><a href="#908">908</a></td></tr
><tr id="gr_svn3_909"

><td id="909"><a href="#909">909</a></td></tr
><tr id="gr_svn3_910"

><td id="910"><a href="#910">910</a></td></tr
><tr id="gr_svn3_911"

><td id="911"><a href="#911">911</a></td></tr
><tr id="gr_svn3_912"

><td id="912"><a href="#912">912</a></td></tr
><tr id="gr_svn3_913"

><td id="913"><a href="#913">913</a></td></tr
><tr id="gr_svn3_914"

><td id="914"><a href="#914">914</a></td></tr
><tr id="gr_svn3_915"

><td id="915"><a href="#915">915</a></td></tr
><tr id="gr_svn3_916"

><td id="916"><a href="#916">916</a></td></tr
><tr id="gr_svn3_917"

><td id="917"><a href="#917">917</a></td></tr
><tr id="gr_svn3_918"

><td id="918"><a href="#918">918</a></td></tr
><tr id="gr_svn3_919"

><td id="919"><a href="#919">919</a></td></tr
><tr id="gr_svn3_920"

><td id="920"><a href="#920">920</a></td></tr
><tr id="gr_svn3_921"

><td id="921"><a href="#921">921</a></td></tr
><tr id="gr_svn3_922"

><td id="922"><a href="#922">922</a></td></tr
><tr id="gr_svn3_923"

><td id="923"><a href="#923">923</a></td></tr
><tr id="gr_svn3_924"

><td id="924"><a href="#924">924</a></td></tr
><tr id="gr_svn3_925"

><td id="925"><a href="#925">925</a></td></tr
><tr id="gr_svn3_926"

><td id="926"><a href="#926">926</a></td></tr
><tr id="gr_svn3_927"

><td id="927"><a href="#927">927</a></td></tr
><tr id="gr_svn3_928"

><td id="928"><a href="#928">928</a></td></tr
><tr id="gr_svn3_929"

><td id="929"><a href="#929">929</a></td></tr
><tr id="gr_svn3_930"

><td id="930"><a href="#930">930</a></td></tr
><tr id="gr_svn3_931"

><td id="931"><a href="#931">931</a></td></tr
><tr id="gr_svn3_932"

><td id="932"><a href="#932">932</a></td></tr
><tr id="gr_svn3_933"

><td id="933"><a href="#933">933</a></td></tr
><tr id="gr_svn3_934"

><td id="934"><a href="#934">934</a></td></tr
><tr id="gr_svn3_935"

><td id="935"><a href="#935">935</a></td></tr
><tr id="gr_svn3_936"

><td id="936"><a href="#936">936</a></td></tr
><tr id="gr_svn3_937"

><td id="937"><a href="#937">937</a></td></tr
><tr id="gr_svn3_938"

><td id="938"><a href="#938">938</a></td></tr
><tr id="gr_svn3_939"

><td id="939"><a href="#939">939</a></td></tr
><tr id="gr_svn3_940"

><td id="940"><a href="#940">940</a></td></tr
><tr id="gr_svn3_941"

><td id="941"><a href="#941">941</a></td></tr
><tr id="gr_svn3_942"

><td id="942"><a href="#942">942</a></td></tr
><tr id="gr_svn3_943"

><td id="943"><a href="#943">943</a></td></tr
><tr id="gr_svn3_944"

><td id="944"><a href="#944">944</a></td></tr
><tr id="gr_svn3_945"

><td id="945"><a href="#945">945</a></td></tr
><tr id="gr_svn3_946"

><td id="946"><a href="#946">946</a></td></tr
><tr id="gr_svn3_947"

><td id="947"><a href="#947">947</a></td></tr
><tr id="gr_svn3_948"

><td id="948"><a href="#948">948</a></td></tr
><tr id="gr_svn3_949"

><td id="949"><a href="#949">949</a></td></tr
><tr id="gr_svn3_950"

><td id="950"><a href="#950">950</a></td></tr
><tr id="gr_svn3_951"

><td id="951"><a href="#951">951</a></td></tr
><tr id="gr_svn3_952"

><td id="952"><a href="#952">952</a></td></tr
><tr id="gr_svn3_953"

><td id="953"><a href="#953">953</a></td></tr
><tr id="gr_svn3_954"

><td id="954"><a href="#954">954</a></td></tr
><tr id="gr_svn3_955"

><td id="955"><a href="#955">955</a></td></tr
><tr id="gr_svn3_956"

><td id="956"><a href="#956">956</a></td></tr
><tr id="gr_svn3_957"

><td id="957"><a href="#957">957</a></td></tr
><tr id="gr_svn3_958"

><td id="958"><a href="#958">958</a></td></tr
><tr id="gr_svn3_959"

><td id="959"><a href="#959">959</a></td></tr
><tr id="gr_svn3_960"

><td id="960"><a href="#960">960</a></td></tr
><tr id="gr_svn3_961"

><td id="961"><a href="#961">961</a></td></tr
><tr id="gr_svn3_962"

><td id="962"><a href="#962">962</a></td></tr
><tr id="gr_svn3_963"

><td id="963"><a href="#963">963</a></td></tr
><tr id="gr_svn3_964"

><td id="964"><a href="#964">964</a></td></tr
><tr id="gr_svn3_965"

><td id="965"><a href="#965">965</a></td></tr
><tr id="gr_svn3_966"

><td id="966"><a href="#966">966</a></td></tr
><tr id="gr_svn3_967"

><td id="967"><a href="#967">967</a></td></tr
><tr id="gr_svn3_968"

><td id="968"><a href="#968">968</a></td></tr
><tr id="gr_svn3_969"

><td id="969"><a href="#969">969</a></td></tr
><tr id="gr_svn3_970"

><td id="970"><a href="#970">970</a></td></tr
><tr id="gr_svn3_971"

><td id="971"><a href="#971">971</a></td></tr
><tr id="gr_svn3_972"

><td id="972"><a href="#972">972</a></td></tr
><tr id="gr_svn3_973"

><td id="973"><a href="#973">973</a></td></tr
><tr id="gr_svn3_974"

><td id="974"><a href="#974">974</a></td></tr
><tr id="gr_svn3_975"

><td id="975"><a href="#975">975</a></td></tr
><tr id="gr_svn3_976"

><td id="976"><a href="#976">976</a></td></tr
><tr id="gr_svn3_977"

><td id="977"><a href="#977">977</a></td></tr
><tr id="gr_svn3_978"

><td id="978"><a href="#978">978</a></td></tr
><tr id="gr_svn3_979"

><td id="979"><a href="#979">979</a></td></tr
><tr id="gr_svn3_980"

><td id="980"><a href="#980">980</a></td></tr
><tr id="gr_svn3_981"

><td id="981"><a href="#981">981</a></td></tr
><tr id="gr_svn3_982"

><td id="982"><a href="#982">982</a></td></tr
><tr id="gr_svn3_983"

><td id="983"><a href="#983">983</a></td></tr
><tr id="gr_svn3_984"

><td id="984"><a href="#984">984</a></td></tr
><tr id="gr_svn3_985"

><td id="985"><a href="#985">985</a></td></tr
><tr id="gr_svn3_986"

><td id="986"><a href="#986">986</a></td></tr
><tr id="gr_svn3_987"

><td id="987"><a href="#987">987</a></td></tr
><tr id="gr_svn3_988"

><td id="988"><a href="#988">988</a></td></tr
><tr id="gr_svn3_989"

><td id="989"><a href="#989">989</a></td></tr
><tr id="gr_svn3_990"

><td id="990"><a href="#990">990</a></td></tr
><tr id="gr_svn3_991"

><td id="991"><a href="#991">991</a></td></tr
><tr id="gr_svn3_992"

><td id="992"><a href="#992">992</a></td></tr
><tr id="gr_svn3_993"

><td id="993"><a href="#993">993</a></td></tr
><tr id="gr_svn3_994"

><td id="994"><a href="#994">994</a></td></tr
><tr id="gr_svn3_995"

><td id="995"><a href="#995">995</a></td></tr
><tr id="gr_svn3_996"

><td id="996"><a href="#996">996</a></td></tr
><tr id="gr_svn3_997"

><td id="997"><a href="#997">997</a></td></tr
><tr id="gr_svn3_998"

><td id="998"><a href="#998">998</a></td></tr
><tr id="gr_svn3_999"

><td id="999"><a href="#999">999</a></td></tr
><tr id="gr_svn3_1000"

><td id="1000"><a href="#1000">1000</a></td></tr
><tr id="gr_svn3_1001"

><td id="1001"><a href="#1001">1001</a></td></tr
><tr id="gr_svn3_1002"

><td id="1002"><a href="#1002">1002</a></td></tr
><tr id="gr_svn3_1003"

><td id="1003"><a href="#1003">1003</a></td></tr
><tr id="gr_svn3_1004"

><td id="1004"><a href="#1004">1004</a></td></tr
><tr id="gr_svn3_1005"

><td id="1005"><a href="#1005">1005</a></td></tr
><tr id="gr_svn3_1006"

><td id="1006"><a href="#1006">1006</a></td></tr
><tr id="gr_svn3_1007"

><td id="1007"><a href="#1007">1007</a></td></tr
><tr id="gr_svn3_1008"

><td id="1008"><a href="#1008">1008</a></td></tr
><tr id="gr_svn3_1009"

><td id="1009"><a href="#1009">1009</a></td></tr
><tr id="gr_svn3_1010"

><td id="1010"><a href="#1010">1010</a></td></tr
><tr id="gr_svn3_1011"

><td id="1011"><a href="#1011">1011</a></td></tr
><tr id="gr_svn3_1012"

><td id="1012"><a href="#1012">1012</a></td></tr
><tr id="gr_svn3_1013"

><td id="1013"><a href="#1013">1013</a></td></tr
><tr id="gr_svn3_1014"

><td id="1014"><a href="#1014">1014</a></td></tr
><tr id="gr_svn3_1015"

><td id="1015"><a href="#1015">1015</a></td></tr
><tr id="gr_svn3_1016"

><td id="1016"><a href="#1016">1016</a></td></tr
><tr id="gr_svn3_1017"

><td id="1017"><a href="#1017">1017</a></td></tr
><tr id="gr_svn3_1018"

><td id="1018"><a href="#1018">1018</a></td></tr
><tr id="gr_svn3_1019"

><td id="1019"><a href="#1019">1019</a></td></tr
><tr id="gr_svn3_1020"

><td id="1020"><a href="#1020">1020</a></td></tr
><tr id="gr_svn3_1021"

><td id="1021"><a href="#1021">1021</a></td></tr
><tr id="gr_svn3_1022"

><td id="1022"><a href="#1022">1022</a></td></tr
><tr id="gr_svn3_1023"

><td id="1023"><a href="#1023">1023</a></td></tr
><tr id="gr_svn3_1024"

><td id="1024"><a href="#1024">1024</a></td></tr
><tr id="gr_svn3_1025"

><td id="1025"><a href="#1025">1025</a></td></tr
><tr id="gr_svn3_1026"

><td id="1026"><a href="#1026">1026</a></td></tr
><tr id="gr_svn3_1027"

><td id="1027"><a href="#1027">1027</a></td></tr
><tr id="gr_svn3_1028"

><td id="1028"><a href="#1028">1028</a></td></tr
><tr id="gr_svn3_1029"

><td id="1029"><a href="#1029">1029</a></td></tr
><tr id="gr_svn3_1030"

><td id="1030"><a href="#1030">1030</a></td></tr
><tr id="gr_svn3_1031"

><td id="1031"><a href="#1031">1031</a></td></tr
><tr id="gr_svn3_1032"

><td id="1032"><a href="#1032">1032</a></td></tr
><tr id="gr_svn3_1033"

><td id="1033"><a href="#1033">1033</a></td></tr
><tr id="gr_svn3_1034"

><td id="1034"><a href="#1034">1034</a></td></tr
><tr id="gr_svn3_1035"

><td id="1035"><a href="#1035">1035</a></td></tr
><tr id="gr_svn3_1036"

><td id="1036"><a href="#1036">1036</a></td></tr
><tr id="gr_svn3_1037"

><td id="1037"><a href="#1037">1037</a></td></tr
><tr id="gr_svn3_1038"

><td id="1038"><a href="#1038">1038</a></td></tr
><tr id="gr_svn3_1039"

><td id="1039"><a href="#1039">1039</a></td></tr
><tr id="gr_svn3_1040"

><td id="1040"><a href="#1040">1040</a></td></tr
><tr id="gr_svn3_1041"

><td id="1041"><a href="#1041">1041</a></td></tr
><tr id="gr_svn3_1042"

><td id="1042"><a href="#1042">1042</a></td></tr
><tr id="gr_svn3_1043"

><td id="1043"><a href="#1043">1043</a></td></tr
><tr id="gr_svn3_1044"

><td id="1044"><a href="#1044">1044</a></td></tr
><tr id="gr_svn3_1045"

><td id="1045"><a href="#1045">1045</a></td></tr
><tr id="gr_svn3_1046"

><td id="1046"><a href="#1046">1046</a></td></tr
><tr id="gr_svn3_1047"

><td id="1047"><a href="#1047">1047</a></td></tr
><tr id="gr_svn3_1048"

><td id="1048"><a href="#1048">1048</a></td></tr
><tr id="gr_svn3_1049"

><td id="1049"><a href="#1049">1049</a></td></tr
><tr id="gr_svn3_1050"

><td id="1050"><a href="#1050">1050</a></td></tr
><tr id="gr_svn3_1051"

><td id="1051"><a href="#1051">1051</a></td></tr
><tr id="gr_svn3_1052"

><td id="1052"><a href="#1052">1052</a></td></tr
><tr id="gr_svn3_1053"

><td id="1053"><a href="#1053">1053</a></td></tr
><tr id="gr_svn3_1054"

><td id="1054"><a href="#1054">1054</a></td></tr
><tr id="gr_svn3_1055"

><td id="1055"><a href="#1055">1055</a></td></tr
><tr id="gr_svn3_1056"

><td id="1056"><a href="#1056">1056</a></td></tr
><tr id="gr_svn3_1057"

><td id="1057"><a href="#1057">1057</a></td></tr
><tr id="gr_svn3_1058"

><td id="1058"><a href="#1058">1058</a></td></tr
><tr id="gr_svn3_1059"

><td id="1059"><a href="#1059">1059</a></td></tr
><tr id="gr_svn3_1060"

><td id="1060"><a href="#1060">1060</a></td></tr
><tr id="gr_svn3_1061"

><td id="1061"><a href="#1061">1061</a></td></tr
><tr id="gr_svn3_1062"

><td id="1062"><a href="#1062">1062</a></td></tr
><tr id="gr_svn3_1063"

><td id="1063"><a href="#1063">1063</a></td></tr
><tr id="gr_svn3_1064"

><td id="1064"><a href="#1064">1064</a></td></tr
><tr id="gr_svn3_1065"

><td id="1065"><a href="#1065">1065</a></td></tr
><tr id="gr_svn3_1066"

><td id="1066"><a href="#1066">1066</a></td></tr
><tr id="gr_svn3_1067"

><td id="1067"><a href="#1067">1067</a></td></tr
><tr id="gr_svn3_1068"

><td id="1068"><a href="#1068">1068</a></td></tr
><tr id="gr_svn3_1069"

><td id="1069"><a href="#1069">1069</a></td></tr
><tr id="gr_svn3_1070"

><td id="1070"><a href="#1070">1070</a></td></tr
><tr id="gr_svn3_1071"

><td id="1071"><a href="#1071">1071</a></td></tr
><tr id="gr_svn3_1072"

><td id="1072"><a href="#1072">1072</a></td></tr
><tr id="gr_svn3_1073"

><td id="1073"><a href="#1073">1073</a></td></tr
><tr id="gr_svn3_1074"

><td id="1074"><a href="#1074">1074</a></td></tr
><tr id="gr_svn3_1075"

><td id="1075"><a href="#1075">1075</a></td></tr
><tr id="gr_svn3_1076"

><td id="1076"><a href="#1076">1076</a></td></tr
><tr id="gr_svn3_1077"

><td id="1077"><a href="#1077">1077</a></td></tr
><tr id="gr_svn3_1078"

><td id="1078"><a href="#1078">1078</a></td></tr
><tr id="gr_svn3_1079"

><td id="1079"><a href="#1079">1079</a></td></tr
><tr id="gr_svn3_1080"

><td id="1080"><a href="#1080">1080</a></td></tr
><tr id="gr_svn3_1081"

><td id="1081"><a href="#1081">1081</a></td></tr
><tr id="gr_svn3_1082"

><td id="1082"><a href="#1082">1082</a></td></tr
><tr id="gr_svn3_1083"

><td id="1083"><a href="#1083">1083</a></td></tr
><tr id="gr_svn3_1084"

><td id="1084"><a href="#1084">1084</a></td></tr
><tr id="gr_svn3_1085"

><td id="1085"><a href="#1085">1085</a></td></tr
><tr id="gr_svn3_1086"

><td id="1086"><a href="#1086">1086</a></td></tr
><tr id="gr_svn3_1087"

><td id="1087"><a href="#1087">1087</a></td></tr
><tr id="gr_svn3_1088"

><td id="1088"><a href="#1088">1088</a></td></tr
><tr id="gr_svn3_1089"

><td id="1089"><a href="#1089">1089</a></td></tr
><tr id="gr_svn3_1090"

><td id="1090"><a href="#1090">1090</a></td></tr
><tr id="gr_svn3_1091"

><td id="1091"><a href="#1091">1091</a></td></tr
><tr id="gr_svn3_1092"

><td id="1092"><a href="#1092">1092</a></td></tr
><tr id="gr_svn3_1093"

><td id="1093"><a href="#1093">1093</a></td></tr
><tr id="gr_svn3_1094"

><td id="1094"><a href="#1094">1094</a></td></tr
><tr id="gr_svn3_1095"

><td id="1095"><a href="#1095">1095</a></td></tr
><tr id="gr_svn3_1096"

><td id="1096"><a href="#1096">1096</a></td></tr
><tr id="gr_svn3_1097"

><td id="1097"><a href="#1097">1097</a></td></tr
><tr id="gr_svn3_1098"

><td id="1098"><a href="#1098">1098</a></td></tr
><tr id="gr_svn3_1099"

><td id="1099"><a href="#1099">1099</a></td></tr
><tr id="gr_svn3_1100"

><td id="1100"><a href="#1100">1100</a></td></tr
><tr id="gr_svn3_1101"

><td id="1101"><a href="#1101">1101</a></td></tr
><tr id="gr_svn3_1102"

><td id="1102"><a href="#1102">1102</a></td></tr
><tr id="gr_svn3_1103"

><td id="1103"><a href="#1103">1103</a></td></tr
><tr id="gr_svn3_1104"

><td id="1104"><a href="#1104">1104</a></td></tr
><tr id="gr_svn3_1105"

><td id="1105"><a href="#1105">1105</a></td></tr
><tr id="gr_svn3_1106"

><td id="1106"><a href="#1106">1106</a></td></tr
><tr id="gr_svn3_1107"

><td id="1107"><a href="#1107">1107</a></td></tr
><tr id="gr_svn3_1108"

><td id="1108"><a href="#1108">1108</a></td></tr
><tr id="gr_svn3_1109"

><td id="1109"><a href="#1109">1109</a></td></tr
><tr id="gr_svn3_1110"

><td id="1110"><a href="#1110">1110</a></td></tr
><tr id="gr_svn3_1111"

><td id="1111"><a href="#1111">1111</a></td></tr
><tr id="gr_svn3_1112"

><td id="1112"><a href="#1112">1112</a></td></tr
><tr id="gr_svn3_1113"

><td id="1113"><a href="#1113">1113</a></td></tr
><tr id="gr_svn3_1114"

><td id="1114"><a href="#1114">1114</a></td></tr
><tr id="gr_svn3_1115"

><td id="1115"><a href="#1115">1115</a></td></tr
><tr id="gr_svn3_1116"

><td id="1116"><a href="#1116">1116</a></td></tr
><tr id="gr_svn3_1117"

><td id="1117"><a href="#1117">1117</a></td></tr
><tr id="gr_svn3_1118"

><td id="1118"><a href="#1118">1118</a></td></tr
><tr id="gr_svn3_1119"

><td id="1119"><a href="#1119">1119</a></td></tr
><tr id="gr_svn3_1120"

><td id="1120"><a href="#1120">1120</a></td></tr
><tr id="gr_svn3_1121"

><td id="1121"><a href="#1121">1121</a></td></tr
><tr id="gr_svn3_1122"

><td id="1122"><a href="#1122">1122</a></td></tr
><tr id="gr_svn3_1123"

><td id="1123"><a href="#1123">1123</a></td></tr
><tr id="gr_svn3_1124"

><td id="1124"><a href="#1124">1124</a></td></tr
><tr id="gr_svn3_1125"

><td id="1125"><a href="#1125">1125</a></td></tr
><tr id="gr_svn3_1126"

><td id="1126"><a href="#1126">1126</a></td></tr
><tr id="gr_svn3_1127"

><td id="1127"><a href="#1127">1127</a></td></tr
><tr id="gr_svn3_1128"

><td id="1128"><a href="#1128">1128</a></td></tr
><tr id="gr_svn3_1129"

><td id="1129"><a href="#1129">1129</a></td></tr
><tr id="gr_svn3_1130"

><td id="1130"><a href="#1130">1130</a></td></tr
><tr id="gr_svn3_1131"

><td id="1131"><a href="#1131">1131</a></td></tr
><tr id="gr_svn3_1132"

><td id="1132"><a href="#1132">1132</a></td></tr
><tr id="gr_svn3_1133"

><td id="1133"><a href="#1133">1133</a></td></tr
><tr id="gr_svn3_1134"

><td id="1134"><a href="#1134">1134</a></td></tr
><tr id="gr_svn3_1135"

><td id="1135"><a href="#1135">1135</a></td></tr
><tr id="gr_svn3_1136"

><td id="1136"><a href="#1136">1136</a></td></tr
><tr id="gr_svn3_1137"

><td id="1137"><a href="#1137">1137</a></td></tr
><tr id="gr_svn3_1138"

><td id="1138"><a href="#1138">1138</a></td></tr
><tr id="gr_svn3_1139"

><td id="1139"><a href="#1139">1139</a></td></tr
><tr id="gr_svn3_1140"

><td id="1140"><a href="#1140">1140</a></td></tr
><tr id="gr_svn3_1141"

><td id="1141"><a href="#1141">1141</a></td></tr
><tr id="gr_svn3_1142"

><td id="1142"><a href="#1142">1142</a></td></tr
><tr id="gr_svn3_1143"

><td id="1143"><a href="#1143">1143</a></td></tr
><tr id="gr_svn3_1144"

><td id="1144"><a href="#1144">1144</a></td></tr
><tr id="gr_svn3_1145"

><td id="1145"><a href="#1145">1145</a></td></tr
><tr id="gr_svn3_1146"

><td id="1146"><a href="#1146">1146</a></td></tr
><tr id="gr_svn3_1147"

><td id="1147"><a href="#1147">1147</a></td></tr
><tr id="gr_svn3_1148"

><td id="1148"><a href="#1148">1148</a></td></tr
><tr id="gr_svn3_1149"

><td id="1149"><a href="#1149">1149</a></td></tr
><tr id="gr_svn3_1150"

><td id="1150"><a href="#1150">1150</a></td></tr
><tr id="gr_svn3_1151"

><td id="1151"><a href="#1151">1151</a></td></tr
><tr id="gr_svn3_1152"

><td id="1152"><a href="#1152">1152</a></td></tr
><tr id="gr_svn3_1153"

><td id="1153"><a href="#1153">1153</a></td></tr
><tr id="gr_svn3_1154"

><td id="1154"><a href="#1154">1154</a></td></tr
><tr id="gr_svn3_1155"

><td id="1155"><a href="#1155">1155</a></td></tr
><tr id="gr_svn3_1156"

><td id="1156"><a href="#1156">1156</a></td></tr
><tr id="gr_svn3_1157"

><td id="1157"><a href="#1157">1157</a></td></tr
><tr id="gr_svn3_1158"

><td id="1158"><a href="#1158">1158</a></td></tr
><tr id="gr_svn3_1159"

><td id="1159"><a href="#1159">1159</a></td></tr
><tr id="gr_svn3_1160"

><td id="1160"><a href="#1160">1160</a></td></tr
><tr id="gr_svn3_1161"

><td id="1161"><a href="#1161">1161</a></td></tr
><tr id="gr_svn3_1162"

><td id="1162"><a href="#1162">1162</a></td></tr
><tr id="gr_svn3_1163"

><td id="1163"><a href="#1163">1163</a></td></tr
><tr id="gr_svn3_1164"

><td id="1164"><a href="#1164">1164</a></td></tr
><tr id="gr_svn3_1165"

><td id="1165"><a href="#1165">1165</a></td></tr
><tr id="gr_svn3_1166"

><td id="1166"><a href="#1166">1166</a></td></tr
><tr id="gr_svn3_1167"

><td id="1167"><a href="#1167">1167</a></td></tr
><tr id="gr_svn3_1168"

><td id="1168"><a href="#1168">1168</a></td></tr
><tr id="gr_svn3_1169"

><td id="1169"><a href="#1169">1169</a></td></tr
><tr id="gr_svn3_1170"

><td id="1170"><a href="#1170">1170</a></td></tr
><tr id="gr_svn3_1171"

><td id="1171"><a href="#1171">1171</a></td></tr
><tr id="gr_svn3_1172"

><td id="1172"><a href="#1172">1172</a></td></tr
><tr id="gr_svn3_1173"

><td id="1173"><a href="#1173">1173</a></td></tr
><tr id="gr_svn3_1174"

><td id="1174"><a href="#1174">1174</a></td></tr
><tr id="gr_svn3_1175"

><td id="1175"><a href="#1175">1175</a></td></tr
><tr id="gr_svn3_1176"

><td id="1176"><a href="#1176">1176</a></td></tr
><tr id="gr_svn3_1177"

><td id="1177"><a href="#1177">1177</a></td></tr
><tr id="gr_svn3_1178"

><td id="1178"><a href="#1178">1178</a></td></tr
><tr id="gr_svn3_1179"

><td id="1179"><a href="#1179">1179</a></td></tr
><tr id="gr_svn3_1180"

><td id="1180"><a href="#1180">1180</a></td></tr
><tr id="gr_svn3_1181"

><td id="1181"><a href="#1181">1181</a></td></tr
><tr id="gr_svn3_1182"

><td id="1182"><a href="#1182">1182</a></td></tr
><tr id="gr_svn3_1183"

><td id="1183"><a href="#1183">1183</a></td></tr
><tr id="gr_svn3_1184"

><td id="1184"><a href="#1184">1184</a></td></tr
><tr id="gr_svn3_1185"

><td id="1185"><a href="#1185">1185</a></td></tr
><tr id="gr_svn3_1186"

><td id="1186"><a href="#1186">1186</a></td></tr
><tr id="gr_svn3_1187"

><td id="1187"><a href="#1187">1187</a></td></tr
><tr id="gr_svn3_1188"

><td id="1188"><a href="#1188">1188</a></td></tr
><tr id="gr_svn3_1189"

><td id="1189"><a href="#1189">1189</a></td></tr
><tr id="gr_svn3_1190"

><td id="1190"><a href="#1190">1190</a></td></tr
><tr id="gr_svn3_1191"

><td id="1191"><a href="#1191">1191</a></td></tr
><tr id="gr_svn3_1192"

><td id="1192"><a href="#1192">1192</a></td></tr
><tr id="gr_svn3_1193"

><td id="1193"><a href="#1193">1193</a></td></tr
><tr id="gr_svn3_1194"

><td id="1194"><a href="#1194">1194</a></td></tr
><tr id="gr_svn3_1195"

><td id="1195"><a href="#1195">1195</a></td></tr
><tr id="gr_svn3_1196"

><td id="1196"><a href="#1196">1196</a></td></tr
><tr id="gr_svn3_1197"

><td id="1197"><a href="#1197">1197</a></td></tr
><tr id="gr_svn3_1198"

><td id="1198"><a href="#1198">1198</a></td></tr
><tr id="gr_svn3_1199"

><td id="1199"><a href="#1199">1199</a></td></tr
><tr id="gr_svn3_1200"

><td id="1200"><a href="#1200">1200</a></td></tr
><tr id="gr_svn3_1201"

><td id="1201"><a href="#1201">1201</a></td></tr
><tr id="gr_svn3_1202"

><td id="1202"><a href="#1202">1202</a></td></tr
><tr id="gr_svn3_1203"

><td id="1203"><a href="#1203">1203</a></td></tr
><tr id="gr_svn3_1204"

><td id="1204"><a href="#1204">1204</a></td></tr
><tr id="gr_svn3_1205"

><td id="1205"><a href="#1205">1205</a></td></tr
><tr id="gr_svn3_1206"

><td id="1206"><a href="#1206">1206</a></td></tr
><tr id="gr_svn3_1207"

><td id="1207"><a href="#1207">1207</a></td></tr
><tr id="gr_svn3_1208"

><td id="1208"><a href="#1208">1208</a></td></tr
><tr id="gr_svn3_1209"

><td id="1209"><a href="#1209">1209</a></td></tr
><tr id="gr_svn3_1210"

><td id="1210"><a href="#1210">1210</a></td></tr
><tr id="gr_svn3_1211"

><td id="1211"><a href="#1211">1211</a></td></tr
><tr id="gr_svn3_1212"

><td id="1212"><a href="#1212">1212</a></td></tr
><tr id="gr_svn3_1213"

><td id="1213"><a href="#1213">1213</a></td></tr
><tr id="gr_svn3_1214"

><td id="1214"><a href="#1214">1214</a></td></tr
><tr id="gr_svn3_1215"

><td id="1215"><a href="#1215">1215</a></td></tr
><tr id="gr_svn3_1216"

><td id="1216"><a href="#1216">1216</a></td></tr
><tr id="gr_svn3_1217"

><td id="1217"><a href="#1217">1217</a></td></tr
><tr id="gr_svn3_1218"

><td id="1218"><a href="#1218">1218</a></td></tr
><tr id="gr_svn3_1219"

><td id="1219"><a href="#1219">1219</a></td></tr
><tr id="gr_svn3_1220"

><td id="1220"><a href="#1220">1220</a></td></tr
><tr id="gr_svn3_1221"

><td id="1221"><a href="#1221">1221</a></td></tr
><tr id="gr_svn3_1222"

><td id="1222"><a href="#1222">1222</a></td></tr
><tr id="gr_svn3_1223"

><td id="1223"><a href="#1223">1223</a></td></tr
><tr id="gr_svn3_1224"

><td id="1224"><a href="#1224">1224</a></td></tr
><tr id="gr_svn3_1225"

><td id="1225"><a href="#1225">1225</a></td></tr
><tr id="gr_svn3_1226"

><td id="1226"><a href="#1226">1226</a></td></tr
><tr id="gr_svn3_1227"

><td id="1227"><a href="#1227">1227</a></td></tr
><tr id="gr_svn3_1228"

><td id="1228"><a href="#1228">1228</a></td></tr
><tr id="gr_svn3_1229"

><td id="1229"><a href="#1229">1229</a></td></tr
><tr id="gr_svn3_1230"

><td id="1230"><a href="#1230">1230</a></td></tr
><tr id="gr_svn3_1231"

><td id="1231"><a href="#1231">1231</a></td></tr
><tr id="gr_svn3_1232"

><td id="1232"><a href="#1232">1232</a></td></tr
><tr id="gr_svn3_1233"

><td id="1233"><a href="#1233">1233</a></td></tr
><tr id="gr_svn3_1234"

><td id="1234"><a href="#1234">1234</a></td></tr
><tr id="gr_svn3_1235"

><td id="1235"><a href="#1235">1235</a></td></tr
><tr id="gr_svn3_1236"

><td id="1236"><a href="#1236">1236</a></td></tr
><tr id="gr_svn3_1237"

><td id="1237"><a href="#1237">1237</a></td></tr
><tr id="gr_svn3_1238"

><td id="1238"><a href="#1238">1238</a></td></tr
><tr id="gr_svn3_1239"

><td id="1239"><a href="#1239">1239</a></td></tr
><tr id="gr_svn3_1240"

><td id="1240"><a href="#1240">1240</a></td></tr
><tr id="gr_svn3_1241"

><td id="1241"><a href="#1241">1241</a></td></tr
><tr id="gr_svn3_1242"

><td id="1242"><a href="#1242">1242</a></td></tr
><tr id="gr_svn3_1243"

><td id="1243"><a href="#1243">1243</a></td></tr
><tr id="gr_svn3_1244"

><td id="1244"><a href="#1244">1244</a></td></tr
><tr id="gr_svn3_1245"

><td id="1245"><a href="#1245">1245</a></td></tr
><tr id="gr_svn3_1246"

><td id="1246"><a href="#1246">1246</a></td></tr
><tr id="gr_svn3_1247"

><td id="1247"><a href="#1247">1247</a></td></tr
><tr id="gr_svn3_1248"

><td id="1248"><a href="#1248">1248</a></td></tr
><tr id="gr_svn3_1249"

><td id="1249"><a href="#1249">1249</a></td></tr
><tr id="gr_svn3_1250"

><td id="1250"><a href="#1250">1250</a></td></tr
><tr id="gr_svn3_1251"

><td id="1251"><a href="#1251">1251</a></td></tr
><tr id="gr_svn3_1252"

><td id="1252"><a href="#1252">1252</a></td></tr
><tr id="gr_svn3_1253"

><td id="1253"><a href="#1253">1253</a></td></tr
><tr id="gr_svn3_1254"

><td id="1254"><a href="#1254">1254</a></td></tr
><tr id="gr_svn3_1255"

><td id="1255"><a href="#1255">1255</a></td></tr
><tr id="gr_svn3_1256"

><td id="1256"><a href="#1256">1256</a></td></tr
><tr id="gr_svn3_1257"

><td id="1257"><a href="#1257">1257</a></td></tr
><tr id="gr_svn3_1258"

><td id="1258"><a href="#1258">1258</a></td></tr
><tr id="gr_svn3_1259"

><td id="1259"><a href="#1259">1259</a></td></tr
><tr id="gr_svn3_1260"

><td id="1260"><a href="#1260">1260</a></td></tr
><tr id="gr_svn3_1261"

><td id="1261"><a href="#1261">1261</a></td></tr
><tr id="gr_svn3_1262"

><td id="1262"><a href="#1262">1262</a></td></tr
><tr id="gr_svn3_1263"

><td id="1263"><a href="#1263">1263</a></td></tr
><tr id="gr_svn3_1264"

><td id="1264"><a href="#1264">1264</a></td></tr
><tr id="gr_svn3_1265"

><td id="1265"><a href="#1265">1265</a></td></tr
><tr id="gr_svn3_1266"

><td id="1266"><a href="#1266">1266</a></td></tr
><tr id="gr_svn3_1267"

><td id="1267"><a href="#1267">1267</a></td></tr
><tr id="gr_svn3_1268"

><td id="1268"><a href="#1268">1268</a></td></tr
><tr id="gr_svn3_1269"

><td id="1269"><a href="#1269">1269</a></td></tr
><tr id="gr_svn3_1270"

><td id="1270"><a href="#1270">1270</a></td></tr
><tr id="gr_svn3_1271"

><td id="1271"><a href="#1271">1271</a></td></tr
><tr id="gr_svn3_1272"

><td id="1272"><a href="#1272">1272</a></td></tr
><tr id="gr_svn3_1273"

><td id="1273"><a href="#1273">1273</a></td></tr
><tr id="gr_svn3_1274"

><td id="1274"><a href="#1274">1274</a></td></tr
><tr id="gr_svn3_1275"

><td id="1275"><a href="#1275">1275</a></td></tr
><tr id="gr_svn3_1276"

><td id="1276"><a href="#1276">1276</a></td></tr
><tr id="gr_svn3_1277"

><td id="1277"><a href="#1277">1277</a></td></tr
><tr id="gr_svn3_1278"

><td id="1278"><a href="#1278">1278</a></td></tr
><tr id="gr_svn3_1279"

><td id="1279"><a href="#1279">1279</a></td></tr
><tr id="gr_svn3_1280"

><td id="1280"><a href="#1280">1280</a></td></tr
><tr id="gr_svn3_1281"

><td id="1281"><a href="#1281">1281</a></td></tr
><tr id="gr_svn3_1282"

><td id="1282"><a href="#1282">1282</a></td></tr
><tr id="gr_svn3_1283"

><td id="1283"><a href="#1283">1283</a></td></tr
><tr id="gr_svn3_1284"

><td id="1284"><a href="#1284">1284</a></td></tr
><tr id="gr_svn3_1285"

><td id="1285"><a href="#1285">1285</a></td></tr
><tr id="gr_svn3_1286"

><td id="1286"><a href="#1286">1286</a></td></tr
><tr id="gr_svn3_1287"

><td id="1287"><a href="#1287">1287</a></td></tr
><tr id="gr_svn3_1288"

><td id="1288"><a href="#1288">1288</a></td></tr
><tr id="gr_svn3_1289"

><td id="1289"><a href="#1289">1289</a></td></tr
><tr id="gr_svn3_1290"

><td id="1290"><a href="#1290">1290</a></td></tr
><tr id="gr_svn3_1291"

><td id="1291"><a href="#1291">1291</a></td></tr
><tr id="gr_svn3_1292"

><td id="1292"><a href="#1292">1292</a></td></tr
><tr id="gr_svn3_1293"

><td id="1293"><a href="#1293">1293</a></td></tr
><tr id="gr_svn3_1294"

><td id="1294"><a href="#1294">1294</a></td></tr
><tr id="gr_svn3_1295"

><td id="1295"><a href="#1295">1295</a></td></tr
><tr id="gr_svn3_1296"

><td id="1296"><a href="#1296">1296</a></td></tr
><tr id="gr_svn3_1297"

><td id="1297"><a href="#1297">1297</a></td></tr
><tr id="gr_svn3_1298"

><td id="1298"><a href="#1298">1298</a></td></tr
><tr id="gr_svn3_1299"

><td id="1299"><a href="#1299">1299</a></td></tr
><tr id="gr_svn3_1300"

><td id="1300"><a href="#1300">1300</a></td></tr
><tr id="gr_svn3_1301"

><td id="1301"><a href="#1301">1301</a></td></tr
><tr id="gr_svn3_1302"

><td id="1302"><a href="#1302">1302</a></td></tr
><tr id="gr_svn3_1303"

><td id="1303"><a href="#1303">1303</a></td></tr
><tr id="gr_svn3_1304"

><td id="1304"><a href="#1304">1304</a></td></tr
><tr id="gr_svn3_1305"

><td id="1305"><a href="#1305">1305</a></td></tr
><tr id="gr_svn3_1306"

><td id="1306"><a href="#1306">1306</a></td></tr
><tr id="gr_svn3_1307"

><td id="1307"><a href="#1307">1307</a></td></tr
><tr id="gr_svn3_1308"

><td id="1308"><a href="#1308">1308</a></td></tr
><tr id="gr_svn3_1309"

><td id="1309"><a href="#1309">1309</a></td></tr
><tr id="gr_svn3_1310"

><td id="1310"><a href="#1310">1310</a></td></tr
><tr id="gr_svn3_1311"

><td id="1311"><a href="#1311">1311</a></td></tr
><tr id="gr_svn3_1312"

><td id="1312"><a href="#1312">1312</a></td></tr
><tr id="gr_svn3_1313"

><td id="1313"><a href="#1313">1313</a></td></tr
><tr id="gr_svn3_1314"

><td id="1314"><a href="#1314">1314</a></td></tr
><tr id="gr_svn3_1315"

><td id="1315"><a href="#1315">1315</a></td></tr
><tr id="gr_svn3_1316"

><td id="1316"><a href="#1316">1316</a></td></tr
><tr id="gr_svn3_1317"

><td id="1317"><a href="#1317">1317</a></td></tr
><tr id="gr_svn3_1318"

><td id="1318"><a href="#1318">1318</a></td></tr
><tr id="gr_svn3_1319"

><td id="1319"><a href="#1319">1319</a></td></tr
><tr id="gr_svn3_1320"

><td id="1320"><a href="#1320">1320</a></td></tr
><tr id="gr_svn3_1321"

><td id="1321"><a href="#1321">1321</a></td></tr
><tr id="gr_svn3_1322"

><td id="1322"><a href="#1322">1322</a></td></tr
><tr id="gr_svn3_1323"

><td id="1323"><a href="#1323">1323</a></td></tr
><tr id="gr_svn3_1324"

><td id="1324"><a href="#1324">1324</a></td></tr
><tr id="gr_svn3_1325"

><td id="1325"><a href="#1325">1325</a></td></tr
><tr id="gr_svn3_1326"

><td id="1326"><a href="#1326">1326</a></td></tr
><tr id="gr_svn3_1327"

><td id="1327"><a href="#1327">1327</a></td></tr
><tr id="gr_svn3_1328"

><td id="1328"><a href="#1328">1328</a></td></tr
><tr id="gr_svn3_1329"

><td id="1329"><a href="#1329">1329</a></td></tr
><tr id="gr_svn3_1330"

><td id="1330"><a href="#1330">1330</a></td></tr
><tr id="gr_svn3_1331"

><td id="1331"><a href="#1331">1331</a></td></tr
><tr id="gr_svn3_1332"

><td id="1332"><a href="#1332">1332</a></td></tr
><tr id="gr_svn3_1333"

><td id="1333"><a href="#1333">1333</a></td></tr
><tr id="gr_svn3_1334"

><td id="1334"><a href="#1334">1334</a></td></tr
><tr id="gr_svn3_1335"

><td id="1335"><a href="#1335">1335</a></td></tr
><tr id="gr_svn3_1336"

><td id="1336"><a href="#1336">1336</a></td></tr
><tr id="gr_svn3_1337"

><td id="1337"><a href="#1337">1337</a></td></tr
><tr id="gr_svn3_1338"

><td id="1338"><a href="#1338">1338</a></td></tr
><tr id="gr_svn3_1339"

><td id="1339"><a href="#1339">1339</a></td></tr
><tr id="gr_svn3_1340"

><td id="1340"><a href="#1340">1340</a></td></tr
><tr id="gr_svn3_1341"

><td id="1341"><a href="#1341">1341</a></td></tr
><tr id="gr_svn3_1342"

><td id="1342"><a href="#1342">1342</a></td></tr
><tr id="gr_svn3_1343"

><td id="1343"><a href="#1343">1343</a></td></tr
><tr id="gr_svn3_1344"

><td id="1344"><a href="#1344">1344</a></td></tr
><tr id="gr_svn3_1345"

><td id="1345"><a href="#1345">1345</a></td></tr
><tr id="gr_svn3_1346"

><td id="1346"><a href="#1346">1346</a></td></tr
><tr id="gr_svn3_1347"

><td id="1347"><a href="#1347">1347</a></td></tr
><tr id="gr_svn3_1348"

><td id="1348"><a href="#1348">1348</a></td></tr
><tr id="gr_svn3_1349"

><td id="1349"><a href="#1349">1349</a></td></tr
><tr id="gr_svn3_1350"

><td id="1350"><a href="#1350">1350</a></td></tr
><tr id="gr_svn3_1351"

><td id="1351"><a href="#1351">1351</a></td></tr
><tr id="gr_svn3_1352"

><td id="1352"><a href="#1352">1352</a></td></tr
><tr id="gr_svn3_1353"

><td id="1353"><a href="#1353">1353</a></td></tr
><tr id="gr_svn3_1354"

><td id="1354"><a href="#1354">1354</a></td></tr
><tr id="gr_svn3_1355"

><td id="1355"><a href="#1355">1355</a></td></tr
><tr id="gr_svn3_1356"

><td id="1356"><a href="#1356">1356</a></td></tr
><tr id="gr_svn3_1357"

><td id="1357"><a href="#1357">1357</a></td></tr
><tr id="gr_svn3_1358"

><td id="1358"><a href="#1358">1358</a></td></tr
><tr id="gr_svn3_1359"

><td id="1359"><a href="#1359">1359</a></td></tr
><tr id="gr_svn3_1360"

><td id="1360"><a href="#1360">1360</a></td></tr
><tr id="gr_svn3_1361"

><td id="1361"><a href="#1361">1361</a></td></tr
><tr id="gr_svn3_1362"

><td id="1362"><a href="#1362">1362</a></td></tr
><tr id="gr_svn3_1363"

><td id="1363"><a href="#1363">1363</a></td></tr
><tr id="gr_svn3_1364"

><td id="1364"><a href="#1364">1364</a></td></tr
><tr id="gr_svn3_1365"

><td id="1365"><a href="#1365">1365</a></td></tr
><tr id="gr_svn3_1366"

><td id="1366"><a href="#1366">1366</a></td></tr
><tr id="gr_svn3_1367"

><td id="1367"><a href="#1367">1367</a></td></tr
><tr id="gr_svn3_1368"

><td id="1368"><a href="#1368">1368</a></td></tr
><tr id="gr_svn3_1369"

><td id="1369"><a href="#1369">1369</a></td></tr
><tr id="gr_svn3_1370"

><td id="1370"><a href="#1370">1370</a></td></tr
><tr id="gr_svn3_1371"

><td id="1371"><a href="#1371">1371</a></td></tr
><tr id="gr_svn3_1372"

><td id="1372"><a href="#1372">1372</a></td></tr
><tr id="gr_svn3_1373"

><td id="1373"><a href="#1373">1373</a></td></tr
><tr id="gr_svn3_1374"

><td id="1374"><a href="#1374">1374</a></td></tr
><tr id="gr_svn3_1375"

><td id="1375"><a href="#1375">1375</a></td></tr
><tr id="gr_svn3_1376"

><td id="1376"><a href="#1376">1376</a></td></tr
><tr id="gr_svn3_1377"

><td id="1377"><a href="#1377">1377</a></td></tr
><tr id="gr_svn3_1378"

><td id="1378"><a href="#1378">1378</a></td></tr
><tr id="gr_svn3_1379"

><td id="1379"><a href="#1379">1379</a></td></tr
><tr id="gr_svn3_1380"

><td id="1380"><a href="#1380">1380</a></td></tr
><tr id="gr_svn3_1381"

><td id="1381"><a href="#1381">1381</a></td></tr
><tr id="gr_svn3_1382"

><td id="1382"><a href="#1382">1382</a></td></tr
><tr id="gr_svn3_1383"

><td id="1383"><a href="#1383">1383</a></td></tr
><tr id="gr_svn3_1384"

><td id="1384"><a href="#1384">1384</a></td></tr
><tr id="gr_svn3_1385"

><td id="1385"><a href="#1385">1385</a></td></tr
><tr id="gr_svn3_1386"

><td id="1386"><a href="#1386">1386</a></td></tr
><tr id="gr_svn3_1387"

><td id="1387"><a href="#1387">1387</a></td></tr
><tr id="gr_svn3_1388"

><td id="1388"><a href="#1388">1388</a></td></tr
><tr id="gr_svn3_1389"

><td id="1389"><a href="#1389">1389</a></td></tr
><tr id="gr_svn3_1390"

><td id="1390"><a href="#1390">1390</a></td></tr
><tr id="gr_svn3_1391"

><td id="1391"><a href="#1391">1391</a></td></tr
><tr id="gr_svn3_1392"

><td id="1392"><a href="#1392">1392</a></td></tr
><tr id="gr_svn3_1393"

><td id="1393"><a href="#1393">1393</a></td></tr
><tr id="gr_svn3_1394"

><td id="1394"><a href="#1394">1394</a></td></tr
><tr id="gr_svn3_1395"

><td id="1395"><a href="#1395">1395</a></td></tr
><tr id="gr_svn3_1396"

><td id="1396"><a href="#1396">1396</a></td></tr
><tr id="gr_svn3_1397"

><td id="1397"><a href="#1397">1397</a></td></tr
><tr id="gr_svn3_1398"

><td id="1398"><a href="#1398">1398</a></td></tr
><tr id="gr_svn3_1399"

><td id="1399"><a href="#1399">1399</a></td></tr
><tr id="gr_svn3_1400"

><td id="1400"><a href="#1400">1400</a></td></tr
><tr id="gr_svn3_1401"

><td id="1401"><a href="#1401">1401</a></td></tr
><tr id="gr_svn3_1402"

><td id="1402"><a href="#1402">1402</a></td></tr
><tr id="gr_svn3_1403"

><td id="1403"><a href="#1403">1403</a></td></tr
><tr id="gr_svn3_1404"

><td id="1404"><a href="#1404">1404</a></td></tr
><tr id="gr_svn3_1405"

><td id="1405"><a href="#1405">1405</a></td></tr
><tr id="gr_svn3_1406"

><td id="1406"><a href="#1406">1406</a></td></tr
><tr id="gr_svn3_1407"

><td id="1407"><a href="#1407">1407</a></td></tr
><tr id="gr_svn3_1408"

><td id="1408"><a href="#1408">1408</a></td></tr
><tr id="gr_svn3_1409"

><td id="1409"><a href="#1409">1409</a></td></tr
><tr id="gr_svn3_1410"

><td id="1410"><a href="#1410">1410</a></td></tr
><tr id="gr_svn3_1411"

><td id="1411"><a href="#1411">1411</a></td></tr
><tr id="gr_svn3_1412"

><td id="1412"><a href="#1412">1412</a></td></tr
><tr id="gr_svn3_1413"

><td id="1413"><a href="#1413">1413</a></td></tr
><tr id="gr_svn3_1414"

><td id="1414"><a href="#1414">1414</a></td></tr
><tr id="gr_svn3_1415"

><td id="1415"><a href="#1415">1415</a></td></tr
><tr id="gr_svn3_1416"

><td id="1416"><a href="#1416">1416</a></td></tr
><tr id="gr_svn3_1417"

><td id="1417"><a href="#1417">1417</a></td></tr
><tr id="gr_svn3_1418"

><td id="1418"><a href="#1418">1418</a></td></tr
><tr id="gr_svn3_1419"

><td id="1419"><a href="#1419">1419</a></td></tr
><tr id="gr_svn3_1420"

><td id="1420"><a href="#1420">1420</a></td></tr
><tr id="gr_svn3_1421"

><td id="1421"><a href="#1421">1421</a></td></tr
><tr id="gr_svn3_1422"

><td id="1422"><a href="#1422">1422</a></td></tr
><tr id="gr_svn3_1423"

><td id="1423"><a href="#1423">1423</a></td></tr
><tr id="gr_svn3_1424"

><td id="1424"><a href="#1424">1424</a></td></tr
><tr id="gr_svn3_1425"

><td id="1425"><a href="#1425">1425</a></td></tr
><tr id="gr_svn3_1426"

><td id="1426"><a href="#1426">1426</a></td></tr
><tr id="gr_svn3_1427"

><td id="1427"><a href="#1427">1427</a></td></tr
><tr id="gr_svn3_1428"

><td id="1428"><a href="#1428">1428</a></td></tr
><tr id="gr_svn3_1429"

><td id="1429"><a href="#1429">1429</a></td></tr
><tr id="gr_svn3_1430"

><td id="1430"><a href="#1430">1430</a></td></tr
><tr id="gr_svn3_1431"

><td id="1431"><a href="#1431">1431</a></td></tr
><tr id="gr_svn3_1432"

><td id="1432"><a href="#1432">1432</a></td></tr
><tr id="gr_svn3_1433"

><td id="1433"><a href="#1433">1433</a></td></tr
><tr id="gr_svn3_1434"

><td id="1434"><a href="#1434">1434</a></td></tr
><tr id="gr_svn3_1435"

><td id="1435"><a href="#1435">1435</a></td></tr
><tr id="gr_svn3_1436"

><td id="1436"><a href="#1436">1436</a></td></tr
><tr id="gr_svn3_1437"

><td id="1437"><a href="#1437">1437</a></td></tr
><tr id="gr_svn3_1438"

><td id="1438"><a href="#1438">1438</a></td></tr
><tr id="gr_svn3_1439"

><td id="1439"><a href="#1439">1439</a></td></tr
><tr id="gr_svn3_1440"

><td id="1440"><a href="#1440">1440</a></td></tr
><tr id="gr_svn3_1441"

><td id="1441"><a href="#1441">1441</a></td></tr
><tr id="gr_svn3_1442"

><td id="1442"><a href="#1442">1442</a></td></tr
><tr id="gr_svn3_1443"

><td id="1443"><a href="#1443">1443</a></td></tr
><tr id="gr_svn3_1444"

><td id="1444"><a href="#1444">1444</a></td></tr
><tr id="gr_svn3_1445"

><td id="1445"><a href="#1445">1445</a></td></tr
><tr id="gr_svn3_1446"

><td id="1446"><a href="#1446">1446</a></td></tr
><tr id="gr_svn3_1447"

><td id="1447"><a href="#1447">1447</a></td></tr
><tr id="gr_svn3_1448"

><td id="1448"><a href="#1448">1448</a></td></tr
><tr id="gr_svn3_1449"

><td id="1449"><a href="#1449">1449</a></td></tr
><tr id="gr_svn3_1450"

><td id="1450"><a href="#1450">1450</a></td></tr
><tr id="gr_svn3_1451"

><td id="1451"><a href="#1451">1451</a></td></tr
><tr id="gr_svn3_1452"

><td id="1452"><a href="#1452">1452</a></td></tr
><tr id="gr_svn3_1453"

><td id="1453"><a href="#1453">1453</a></td></tr
><tr id="gr_svn3_1454"

><td id="1454"><a href="#1454">1454</a></td></tr
><tr id="gr_svn3_1455"

><td id="1455"><a href="#1455">1455</a></td></tr
><tr id="gr_svn3_1456"

><td id="1456"><a href="#1456">1456</a></td></tr
><tr id="gr_svn3_1457"

><td id="1457"><a href="#1457">1457</a></td></tr
><tr id="gr_svn3_1458"

><td id="1458"><a href="#1458">1458</a></td></tr
><tr id="gr_svn3_1459"

><td id="1459"><a href="#1459">1459</a></td></tr
><tr id="gr_svn3_1460"

><td id="1460"><a href="#1460">1460</a></td></tr
><tr id="gr_svn3_1461"

><td id="1461"><a href="#1461">1461</a></td></tr
><tr id="gr_svn3_1462"

><td id="1462"><a href="#1462">1462</a></td></tr
><tr id="gr_svn3_1463"

><td id="1463"><a href="#1463">1463</a></td></tr
><tr id="gr_svn3_1464"

><td id="1464"><a href="#1464">1464</a></td></tr
><tr id="gr_svn3_1465"

><td id="1465"><a href="#1465">1465</a></td></tr
><tr id="gr_svn3_1466"

><td id="1466"><a href="#1466">1466</a></td></tr
><tr id="gr_svn3_1467"

><td id="1467"><a href="#1467">1467</a></td></tr
><tr id="gr_svn3_1468"

><td id="1468"><a href="#1468">1468</a></td></tr
><tr id="gr_svn3_1469"

><td id="1469"><a href="#1469">1469</a></td></tr
><tr id="gr_svn3_1470"

><td id="1470"><a href="#1470">1470</a></td></tr
><tr id="gr_svn3_1471"

><td id="1471"><a href="#1471">1471</a></td></tr
><tr id="gr_svn3_1472"

><td id="1472"><a href="#1472">1472</a></td></tr
><tr id="gr_svn3_1473"

><td id="1473"><a href="#1473">1473</a></td></tr
><tr id="gr_svn3_1474"

><td id="1474"><a href="#1474">1474</a></td></tr
><tr id="gr_svn3_1475"

><td id="1475"><a href="#1475">1475</a></td></tr
><tr id="gr_svn3_1476"

><td id="1476"><a href="#1476">1476</a></td></tr
><tr id="gr_svn3_1477"

><td id="1477"><a href="#1477">1477</a></td></tr
><tr id="gr_svn3_1478"

><td id="1478"><a href="#1478">1478</a></td></tr
><tr id="gr_svn3_1479"

><td id="1479"><a href="#1479">1479</a></td></tr
><tr id="gr_svn3_1480"

><td id="1480"><a href="#1480">1480</a></td></tr
><tr id="gr_svn3_1481"

><td id="1481"><a href="#1481">1481</a></td></tr
><tr id="gr_svn3_1482"

><td id="1482"><a href="#1482">1482</a></td></tr
><tr id="gr_svn3_1483"

><td id="1483"><a href="#1483">1483</a></td></tr
><tr id="gr_svn3_1484"

><td id="1484"><a href="#1484">1484</a></td></tr
><tr id="gr_svn3_1485"

><td id="1485"><a href="#1485">1485</a></td></tr
><tr id="gr_svn3_1486"

><td id="1486"><a href="#1486">1486</a></td></tr
><tr id="gr_svn3_1487"

><td id="1487"><a href="#1487">1487</a></td></tr
><tr id="gr_svn3_1488"

><td id="1488"><a href="#1488">1488</a></td></tr
><tr id="gr_svn3_1489"

><td id="1489"><a href="#1489">1489</a></td></tr
><tr id="gr_svn3_1490"

><td id="1490"><a href="#1490">1490</a></td></tr
><tr id="gr_svn3_1491"

><td id="1491"><a href="#1491">1491</a></td></tr
><tr id="gr_svn3_1492"

><td id="1492"><a href="#1492">1492</a></td></tr
><tr id="gr_svn3_1493"

><td id="1493"><a href="#1493">1493</a></td></tr
><tr id="gr_svn3_1494"

><td id="1494"><a href="#1494">1494</a></td></tr
><tr id="gr_svn3_1495"

><td id="1495"><a href="#1495">1495</a></td></tr
><tr id="gr_svn3_1496"

><td id="1496"><a href="#1496">1496</a></td></tr
><tr id="gr_svn3_1497"

><td id="1497"><a href="#1497">1497</a></td></tr
><tr id="gr_svn3_1498"

><td id="1498"><a href="#1498">1498</a></td></tr
><tr id="gr_svn3_1499"

><td id="1499"><a href="#1499">1499</a></td></tr
><tr id="gr_svn3_1500"

><td id="1500"><a href="#1500">1500</a></td></tr
><tr id="gr_svn3_1501"

><td id="1501"><a href="#1501">1501</a></td></tr
><tr id="gr_svn3_1502"

><td id="1502"><a href="#1502">1502</a></td></tr
><tr id="gr_svn3_1503"

><td id="1503"><a href="#1503">1503</a></td></tr
><tr id="gr_svn3_1504"

><td id="1504"><a href="#1504">1504</a></td></tr
><tr id="gr_svn3_1505"

><td id="1505"><a href="#1505">1505</a></td></tr
><tr id="gr_svn3_1506"

><td id="1506"><a href="#1506">1506</a></td></tr
><tr id="gr_svn3_1507"

><td id="1507"><a href="#1507">1507</a></td></tr
><tr id="gr_svn3_1508"

><td id="1508"><a href="#1508">1508</a></td></tr
><tr id="gr_svn3_1509"

><td id="1509"><a href="#1509">1509</a></td></tr
><tr id="gr_svn3_1510"

><td id="1510"><a href="#1510">1510</a></td></tr
><tr id="gr_svn3_1511"

><td id="1511"><a href="#1511">1511</a></td></tr
><tr id="gr_svn3_1512"

><td id="1512"><a href="#1512">1512</a></td></tr
><tr id="gr_svn3_1513"

><td id="1513"><a href="#1513">1513</a></td></tr
><tr id="gr_svn3_1514"

><td id="1514"><a href="#1514">1514</a></td></tr
><tr id="gr_svn3_1515"

><td id="1515"><a href="#1515">1515</a></td></tr
><tr id="gr_svn3_1516"

><td id="1516"><a href="#1516">1516</a></td></tr
><tr id="gr_svn3_1517"

><td id="1517"><a href="#1517">1517</a></td></tr
><tr id="gr_svn3_1518"

><td id="1518"><a href="#1518">1518</a></td></tr
><tr id="gr_svn3_1519"

><td id="1519"><a href="#1519">1519</a></td></tr
><tr id="gr_svn3_1520"

><td id="1520"><a href="#1520">1520</a></td></tr
><tr id="gr_svn3_1521"

><td id="1521"><a href="#1521">1521</a></td></tr
><tr id="gr_svn3_1522"

><td id="1522"><a href="#1522">1522</a></td></tr
><tr id="gr_svn3_1523"

><td id="1523"><a href="#1523">1523</a></td></tr
><tr id="gr_svn3_1524"

><td id="1524"><a href="#1524">1524</a></td></tr
><tr id="gr_svn3_1525"

><td id="1525"><a href="#1525">1525</a></td></tr
><tr id="gr_svn3_1526"

><td id="1526"><a href="#1526">1526</a></td></tr
><tr id="gr_svn3_1527"

><td id="1527"><a href="#1527">1527</a></td></tr
><tr id="gr_svn3_1528"

><td id="1528"><a href="#1528">1528</a></td></tr
><tr id="gr_svn3_1529"

><td id="1529"><a href="#1529">1529</a></td></tr
><tr id="gr_svn3_1530"

><td id="1530"><a href="#1530">1530</a></td></tr
><tr id="gr_svn3_1531"

><td id="1531"><a href="#1531">1531</a></td></tr
><tr id="gr_svn3_1532"

><td id="1532"><a href="#1532">1532</a></td></tr
><tr id="gr_svn3_1533"

><td id="1533"><a href="#1533">1533</a></td></tr
><tr id="gr_svn3_1534"

><td id="1534"><a href="#1534">1534</a></td></tr
></table></pre>
<pre><table width="100%"><tr class="nocursor"><td></td></tr></table></pre>
</td>
<td id="lines">
<pre><table width="100%"><tr class="cursor_stop cursor_hidden"><td></td></tr></table></pre>
<pre class="prettyprint "><table id="src_table_0"><tr
id=sl_svn3_1

><td class="source">&lt;?php<br></td></tr
><tr
id=sl_svn3_2

><td class="source">/**<br></td></tr
><tr
id=sl_svn3_3

><td class="source"> * *** BEGIN LICENSE BLOCK *****<br></td></tr
><tr
id=sl_svn3_4

><td class="source"> *  <br></td></tr
><tr
id=sl_svn3_5

><td class="source"> * This file is part of FirePHP (http://www.firephp.org/).<br></td></tr
><tr
id=sl_svn3_6

><td class="source"> * <br></td></tr
><tr
id=sl_svn3_7

><td class="source"> * Software License Agreement (New BSD License)<br></td></tr
><tr
id=sl_svn3_8

><td class="source"> * <br></td></tr
><tr
id=sl_svn3_9

><td class="source"> * Copyright (c) 2006-2009, Christoph Dorn<br></td></tr
><tr
id=sl_svn3_10

><td class="source"> * All rights reserved.<br></td></tr
><tr
id=sl_svn3_11

><td class="source"> * <br></td></tr
><tr
id=sl_svn3_12

><td class="source"> * Redistribution and use in source and binary forms, with or without modification,<br></td></tr
><tr
id=sl_svn3_13

><td class="source"> * are permitted provided that the following conditions are met:<br></td></tr
><tr
id=sl_svn3_14

><td class="source"> * <br></td></tr
><tr
id=sl_svn3_15

><td class="source"> *     * Redistributions of source code must retain the above copyright notice,<br></td></tr
><tr
id=sl_svn3_16

><td class="source"> *       this list of conditions and the following disclaimer.<br></td></tr
><tr
id=sl_svn3_17

><td class="source"> * <br></td></tr
><tr
id=sl_svn3_18

><td class="source"> *     * Redistributions in binary form must reproduce the above copyright notice,<br></td></tr
><tr
id=sl_svn3_19

><td class="source"> *       this list of conditions and the following disclaimer in the documentation<br></td></tr
><tr
id=sl_svn3_20

><td class="source"> *       and/or other materials provided with the distribution.<br></td></tr
><tr
id=sl_svn3_21

><td class="source"> * <br></td></tr
><tr
id=sl_svn3_22

><td class="source"> *     * Neither the name of Christoph Dorn nor the names of its<br></td></tr
><tr
id=sl_svn3_23

><td class="source"> *       contributors may be used to endorse or promote products derived from this<br></td></tr
><tr
id=sl_svn3_24

><td class="source"> *       software without specific prior written permission.<br></td></tr
><tr
id=sl_svn3_25

><td class="source"> * <br></td></tr
><tr
id=sl_svn3_26

><td class="source"> * THIS SOFTWARE IS PROVIDED BY THE COPYRIGHT HOLDERS AND CONTRIBUTORS &quot;AS IS&quot; AND<br></td></tr
><tr
id=sl_svn3_27

><td class="source"> * ANY EXPRESS OR IMPLIED WARRANTIES, INCLUDING, BUT NOT LIMITED TO, THE IMPLIED<br></td></tr
><tr
id=sl_svn3_28

><td class="source"> * WARRANTIES OF MERCHANTABILITY AND FITNESS FOR A PARTICULAR PURPOSE ARE<br></td></tr
><tr
id=sl_svn3_29

><td class="source"> * DISCLAIMED. IN NO EVENT SHALL THE COPYRIGHT OWNER OR CONTRIBUTORS BE LIABLE FOR<br></td></tr
><tr
id=sl_svn3_30

><td class="source"> * ANY DIRECT, INDIRECT, INCIDENTAL, SPECIAL, EXEMPLARY, OR CONSEQUENTIAL DAMAGES<br></td></tr
><tr
id=sl_svn3_31

><td class="source"> * (INCLUDING, BUT NOT LIMITED TO, PROCUREMENT OF SUBSTITUTE GOODS OR SERVICES;<br></td></tr
><tr
id=sl_svn3_32

><td class="source"> * LOSS OF USE, DATA, OR PROFITS; OR BUSINESS INTERRUPTION) HOWEVER CAUSED AND ON<br></td></tr
><tr
id=sl_svn3_33

><td class="source"> * ANY THEORY OF LIABILITY, WHETHER IN CONTRACT, STRICT LIABILITY, OR TORT<br></td></tr
><tr
id=sl_svn3_34

><td class="source"> * (INCLUDING NEGLIGENCE OR OTHERWISE) ARISING IN ANY WAY OUT OF THE USE OF THIS<br></td></tr
><tr
id=sl_svn3_35

><td class="source"> * SOFTWARE, EVEN IF ADVISED OF THE POSSIBILITY OF SUCH DAMAGE.<br></td></tr
><tr
id=sl_svn3_36

><td class="source"> * <br></td></tr
><tr
id=sl_svn3_37

><td class="source"> * ***** END LICENSE BLOCK *****<br></td></tr
><tr
id=sl_svn3_38

><td class="source"> * <br></td></tr
><tr
id=sl_svn3_39

><td class="source"> * @copyright   Copyright (C) 2007-2009 Christoph Dorn<br></td></tr
><tr
id=sl_svn3_40

><td class="source"> * @author      Christoph Dorn &lt;christoph@christophdorn.com&gt;<br></td></tr
><tr
id=sl_svn3_41

><td class="source"> * @license     http://www.opensource.org/licenses/bsd-license.php<br></td></tr
><tr
id=sl_svn3_42

><td class="source"> * @package     FirePHP<br></td></tr
><tr
id=sl_svn3_43

><td class="source"> */<br></td></tr
><tr
id=sl_svn3_44

><td class="source"> <br></td></tr
><tr
id=sl_svn3_45

><td class="source"> <br></td></tr
><tr
id=sl_svn3_46

><td class="source">/**<br></td></tr
><tr
id=sl_svn3_47

><td class="source"> * Sends the given data to the FirePHP Firefox Extension.<br></td></tr
><tr
id=sl_svn3_48

><td class="source"> * The data can be displayed in the Firebug Console or in the<br></td></tr
><tr
id=sl_svn3_49

><td class="source"> * &quot;Server&quot; request tab.<br></td></tr
><tr
id=sl_svn3_50

><td class="source"> * <br></td></tr
><tr
id=sl_svn3_51

><td class="source"> * For more information see: http://www.firephp.org/<br></td></tr
><tr
id=sl_svn3_52

><td class="source"> * <br></td></tr
><tr
id=sl_svn3_53

><td class="source"> * @copyright   Copyright (C) 2007-2009 Christoph Dorn<br></td></tr
><tr
id=sl_svn3_54

><td class="source"> * @author      Christoph Dorn &lt;christoph@christophdorn.com&gt;<br></td></tr
><tr
id=sl_svn3_55

><td class="source"> * @license     http://www.opensource.org/licenses/bsd-license.php<br></td></tr
><tr
id=sl_svn3_56

><td class="source"> * @package     FirePHP<br></td></tr
><tr
id=sl_svn3_57

><td class="source"> */<br></td></tr
><tr
id=sl_svn3_58

><td class="source">class FirePHP {<br></td></tr
><tr
id=sl_svn3_59

><td class="source">  <br></td></tr
><tr
id=sl_svn3_60

><td class="source">  /**<br></td></tr
><tr
id=sl_svn3_61

><td class="source">   * FirePHP version<br></td></tr
><tr
id=sl_svn3_62

><td class="source">   *<br></td></tr
><tr
id=sl_svn3_63

><td class="source">   * @var string<br></td></tr
><tr
id=sl_svn3_64

><td class="source">   */<br></td></tr
><tr
id=sl_svn3_65

><td class="source">  const VERSION = &#39;0.3&#39;;<br></td></tr
><tr
id=sl_svn3_66

><td class="source">  <br></td></tr
><tr
id=sl_svn3_67

><td class="source">  /**<br></td></tr
><tr
id=sl_svn3_68

><td class="source">   * Firebug LOG level<br></td></tr
><tr
id=sl_svn3_69

><td class="source">   *<br></td></tr
><tr
id=sl_svn3_70

><td class="source">   * Logs a message to firebug console.<br></td></tr
><tr
id=sl_svn3_71

><td class="source">   * <br></td></tr
><tr
id=sl_svn3_72

><td class="source">   * @var string<br></td></tr
><tr
id=sl_svn3_73

><td class="source">   */<br></td></tr
><tr
id=sl_svn3_74

><td class="source">  const LOG = &#39;LOG&#39;;<br></td></tr
><tr
id=sl_svn3_75

><td class="source">  <br></td></tr
><tr
id=sl_svn3_76

><td class="source">  /**<br></td></tr
><tr
id=sl_svn3_77

><td class="source">   * Firebug INFO level<br></td></tr
><tr
id=sl_svn3_78

><td class="source">   *<br></td></tr
><tr
id=sl_svn3_79

><td class="source">   * Logs a message to firebug console and displays an info icon before the message.<br></td></tr
><tr
id=sl_svn3_80

><td class="source">   * <br></td></tr
><tr
id=sl_svn3_81

><td class="source">   * @var string<br></td></tr
><tr
id=sl_svn3_82

><td class="source">   */<br></td></tr
><tr
id=sl_svn3_83

><td class="source">  const INFO = &#39;INFO&#39;;<br></td></tr
><tr
id=sl_svn3_84

><td class="source">  <br></td></tr
><tr
id=sl_svn3_85

><td class="source">  /**<br></td></tr
><tr
id=sl_svn3_86

><td class="source">   * Firebug WARN level<br></td></tr
><tr
id=sl_svn3_87

><td class="source">   *<br></td></tr
><tr
id=sl_svn3_88

><td class="source">   * Logs a message to firebug console, displays an warning icon before the message and colors the line turquoise.<br></td></tr
><tr
id=sl_svn3_89

><td class="source">   * <br></td></tr
><tr
id=sl_svn3_90

><td class="source">   * @var string<br></td></tr
><tr
id=sl_svn3_91

><td class="source">   */<br></td></tr
><tr
id=sl_svn3_92

><td class="source">  const WARN = &#39;WARN&#39;;<br></td></tr
><tr
id=sl_svn3_93

><td class="source">  <br></td></tr
><tr
id=sl_svn3_94

><td class="source">  /**<br></td></tr
><tr
id=sl_svn3_95

><td class="source">   * Firebug ERROR level<br></td></tr
><tr
id=sl_svn3_96

><td class="source">   *<br></td></tr
><tr
id=sl_svn3_97

><td class="source">   * Logs a message to firebug console, displays an error icon before the message and colors the line yellow. Also increments the firebug error count.<br></td></tr
><tr
id=sl_svn3_98

><td class="source">   * <br></td></tr
><tr
id=sl_svn3_99

><td class="source">   * @var string<br></td></tr
><tr
id=sl_svn3_100

><td class="source">   */<br></td></tr
><tr
id=sl_svn3_101

><td class="source">  const ERROR = &#39;ERROR&#39;;<br></td></tr
><tr
id=sl_svn3_102

><td class="source">  <br></td></tr
><tr
id=sl_svn3_103

><td class="source">  /**<br></td></tr
><tr
id=sl_svn3_104

><td class="source">   * Dumps a variable to firebug&#39;s server panel<br></td></tr
><tr
id=sl_svn3_105

><td class="source">   *<br></td></tr
><tr
id=sl_svn3_106

><td class="source">   * @var string<br></td></tr
><tr
id=sl_svn3_107

><td class="source">   */<br></td></tr
><tr
id=sl_svn3_108

><td class="source">  const DUMP = &#39;DUMP&#39;;<br></td></tr
><tr
id=sl_svn3_109

><td class="source">  <br></td></tr
><tr
id=sl_svn3_110

><td class="source">  /**<br></td></tr
><tr
id=sl_svn3_111

><td class="source">   * Displays a stack trace in firebug console<br></td></tr
><tr
id=sl_svn3_112

><td class="source">   *<br></td></tr
><tr
id=sl_svn3_113

><td class="source">   * @var string<br></td></tr
><tr
id=sl_svn3_114

><td class="source">   */<br></td></tr
><tr
id=sl_svn3_115

><td class="source">  const TRACE = &#39;TRACE&#39;;<br></td></tr
><tr
id=sl_svn3_116

><td class="source">  <br></td></tr
><tr
id=sl_svn3_117

><td class="source">  /**<br></td></tr
><tr
id=sl_svn3_118

><td class="source">   * Displays an exception in firebug console<br></td></tr
><tr
id=sl_svn3_119

><td class="source">   * <br></td></tr
><tr
id=sl_svn3_120

><td class="source">   * Increments the firebug error count.<br></td></tr
><tr
id=sl_svn3_121

><td class="source">   *<br></td></tr
><tr
id=sl_svn3_122

><td class="source">   * @var string<br></td></tr
><tr
id=sl_svn3_123

><td class="source">   */<br></td></tr
><tr
id=sl_svn3_124

><td class="source">  const EXCEPTION = &#39;EXCEPTION&#39;;<br></td></tr
><tr
id=sl_svn3_125

><td class="source">  <br></td></tr
><tr
id=sl_svn3_126

><td class="source">  /**<br></td></tr
><tr
id=sl_svn3_127

><td class="source">   * Displays an table in firebug console<br></td></tr
><tr
id=sl_svn3_128

><td class="source">   *<br></td></tr
><tr
id=sl_svn3_129

><td class="source">   * @var string<br></td></tr
><tr
id=sl_svn3_130

><td class="source">   */<br></td></tr
><tr
id=sl_svn3_131

><td class="source">  const TABLE = &#39;TABLE&#39;;<br></td></tr
><tr
id=sl_svn3_132

><td class="source">  <br></td></tr
><tr
id=sl_svn3_133

><td class="source">  /**<br></td></tr
><tr
id=sl_svn3_134

><td class="source">   * Starts a group in firebug console<br></td></tr
><tr
id=sl_svn3_135

><td class="source">   * <br></td></tr
><tr
id=sl_svn3_136

><td class="source">   * @var string<br></td></tr
><tr
id=sl_svn3_137

><td class="source">   */<br></td></tr
><tr
id=sl_svn3_138

><td class="source">  const GROUP_START = &#39;GROUP_START&#39;;<br></td></tr
><tr
id=sl_svn3_139

><td class="source">  <br></td></tr
><tr
id=sl_svn3_140

><td class="source">  /**<br></td></tr
><tr
id=sl_svn3_141

><td class="source">   * Ends a group in firebug console<br></td></tr
><tr
id=sl_svn3_142

><td class="source">   * <br></td></tr
><tr
id=sl_svn3_143

><td class="source">   * @var string<br></td></tr
><tr
id=sl_svn3_144

><td class="source">   */<br></td></tr
><tr
id=sl_svn3_145

><td class="source">  const GROUP_END = &#39;GROUP_END&#39;;<br></td></tr
><tr
id=sl_svn3_146

><td class="source">  <br></td></tr
><tr
id=sl_svn3_147

><td class="source">  /**<br></td></tr
><tr
id=sl_svn3_148

><td class="source">   * Singleton instance of FirePHP<br></td></tr
><tr
id=sl_svn3_149

><td class="source">   *<br></td></tr
><tr
id=sl_svn3_150

><td class="source">   * @var FirePHP<br></td></tr
><tr
id=sl_svn3_151

><td class="source">   */<br></td></tr
><tr
id=sl_svn3_152

><td class="source">  protected static $instance = null;<br></td></tr
><tr
id=sl_svn3_153

><td class="source">  <br></td></tr
><tr
id=sl_svn3_154

><td class="source">  /**<br></td></tr
><tr
id=sl_svn3_155

><td class="source">   * Flag whether we are logging from within the exception handler<br></td></tr
><tr
id=sl_svn3_156

><td class="source">   * <br></td></tr
><tr
id=sl_svn3_157

><td class="source">   * @var boolean<br></td></tr
><tr
id=sl_svn3_158

><td class="source">   */<br></td></tr
><tr
id=sl_svn3_159

><td class="source">  protected $inExceptionHandler = false;<br></td></tr
><tr
id=sl_svn3_160

><td class="source">  <br></td></tr
><tr
id=sl_svn3_161

><td class="source">  /**<br></td></tr
><tr
id=sl_svn3_162

><td class="source">   * Flag whether to throw PHP errors that have been converted to ErrorExceptions<br></td></tr
><tr
id=sl_svn3_163

><td class="source">   * <br></td></tr
><tr
id=sl_svn3_164

><td class="source">   * @var boolean<br></td></tr
><tr
id=sl_svn3_165

><td class="source">   */<br></td></tr
><tr
id=sl_svn3_166

><td class="source">  protected $throwErrorExceptions = true;<br></td></tr
><tr
id=sl_svn3_167

><td class="source">  <br></td></tr
><tr
id=sl_svn3_168

><td class="source">  /**<br></td></tr
><tr
id=sl_svn3_169

><td class="source">   * Flag whether to convert PHP assertion errors to Exceptions<br></td></tr
><tr
id=sl_svn3_170

><td class="source">   * <br></td></tr
><tr
id=sl_svn3_171

><td class="source">   * @var boolean<br></td></tr
><tr
id=sl_svn3_172

><td class="source">   */<br></td></tr
><tr
id=sl_svn3_173

><td class="source">  protected $convertAssertionErrorsToExceptions = true;<br></td></tr
><tr
id=sl_svn3_174

><td class="source">  <br></td></tr
><tr
id=sl_svn3_175

><td class="source">  /**<br></td></tr
><tr
id=sl_svn3_176

><td class="source">   * Flag whether to throw PHP assertion errors that have been converted to Exceptions<br></td></tr
><tr
id=sl_svn3_177

><td class="source">   * <br></td></tr
><tr
id=sl_svn3_178

><td class="source">   * @var boolean<br></td></tr
><tr
id=sl_svn3_179

><td class="source">   */<br></td></tr
><tr
id=sl_svn3_180

><td class="source">  protected $throwAssertionExceptions = false;<br></td></tr
><tr
id=sl_svn3_181

><td class="source">  <br></td></tr
><tr
id=sl_svn3_182

><td class="source">  /**<br></td></tr
><tr
id=sl_svn3_183

><td class="source">   * Wildfire protocol message index<br></td></tr
><tr
id=sl_svn3_184

><td class="source">   *<br></td></tr
><tr
id=sl_svn3_185

><td class="source">   * @var int<br></td></tr
><tr
id=sl_svn3_186

><td class="source">   */<br></td></tr
><tr
id=sl_svn3_187

><td class="source">  protected $messageIndex = 1;<br></td></tr
><tr
id=sl_svn3_188

><td class="source">    <br></td></tr
><tr
id=sl_svn3_189

><td class="source">  /**<br></td></tr
><tr
id=sl_svn3_190

><td class="source">   * Options for the library<br></td></tr
><tr
id=sl_svn3_191

><td class="source">   * <br></td></tr
><tr
id=sl_svn3_192

><td class="source">   * @var array<br></td></tr
><tr
id=sl_svn3_193

><td class="source">   */<br></td></tr
><tr
id=sl_svn3_194

><td class="source">  protected $options = array(&#39;maxObjectDepth&#39; =&gt; 10,<br></td></tr
><tr
id=sl_svn3_195

><td class="source">                             &#39;maxArrayDepth&#39; =&gt; 20,<br></td></tr
><tr
id=sl_svn3_196

><td class="source">                             &#39;useNativeJsonEncode&#39; =&gt; true,<br></td></tr
><tr
id=sl_svn3_197

><td class="source">                             &#39;includeLineNumbers&#39; =&gt; true,<br></td></tr
><tr
id=sl_svn3_198

><td class="source">							 &#39;LineNumbersSkipNested&#39; =&gt; 1);<br></td></tr
><tr
id=sl_svn3_199

><td class="source"><br></td></tr
><tr
id=sl_svn3_200

><td class="source">  /**<br></td></tr
><tr
id=sl_svn3_201

><td class="source">   * Filters used to exclude object members when encoding<br></td></tr
><tr
id=sl_svn3_202

><td class="source">   * <br></td></tr
><tr
id=sl_svn3_203

><td class="source">   * @var array<br></td></tr
><tr
id=sl_svn3_204

><td class="source">   */<br></td></tr
><tr
id=sl_svn3_205

><td class="source">  protected $objectFilters = array();<br></td></tr
><tr
id=sl_svn3_206

><td class="source">  <br></td></tr
><tr
id=sl_svn3_207

><td class="source">  /**<br></td></tr
><tr
id=sl_svn3_208

><td class="source">   * A stack of objects used to detect recursion during object encoding<br></td></tr
><tr
id=sl_svn3_209

><td class="source">   * <br></td></tr
><tr
id=sl_svn3_210

><td class="source">   * @var object<br></td></tr
><tr
id=sl_svn3_211

><td class="source">   */<br></td></tr
><tr
id=sl_svn3_212

><td class="source">  protected $objectStack = array();<br></td></tr
><tr
id=sl_svn3_213

><td class="source">  <br></td></tr
><tr
id=sl_svn3_214

><td class="source">  /**<br></td></tr
><tr
id=sl_svn3_215

><td class="source">   * Flag to enable/disable logging<br></td></tr
><tr
id=sl_svn3_216

><td class="source">   * <br></td></tr
><tr
id=sl_svn3_217

><td class="source">   * @var boolean<br></td></tr
><tr
id=sl_svn3_218

><td class="source">   */<br></td></tr
><tr
id=sl_svn3_219

><td class="source">  protected $enabled = true;<br></td></tr
><tr
id=sl_svn3_220

><td class="source"><br></td></tr
><tr
id=sl_svn3_221

><td class="source">  /**<br></td></tr
><tr
id=sl_svn3_222

><td class="source">   * The object constructor<br></td></tr
><tr
id=sl_svn3_223

><td class="source">   */<br></td></tr
><tr
id=sl_svn3_224

><td class="source">  function __construct() {<br></td></tr
><tr
id=sl_svn3_225

><td class="source">  }<br></td></tr
><tr
id=sl_svn3_226

><td class="source"><br></td></tr
><tr
id=sl_svn3_227

><td class="source">  /**<br></td></tr
><tr
id=sl_svn3_228

><td class="source">   * When the object gets serialized only include specific object members.<br></td></tr
><tr
id=sl_svn3_229

><td class="source">   * <br></td></tr
><tr
id=sl_svn3_230

><td class="source">   * @return array<br></td></tr
><tr
id=sl_svn3_231

><td class="source">   */  <br></td></tr
><tr
id=sl_svn3_232

><td class="source">  public function __sleep() {<br></td></tr
><tr
id=sl_svn3_233

><td class="source">    return array(&#39;options&#39;,&#39;objectFilters&#39;,&#39;enabled&#39;);<br></td></tr
><tr
id=sl_svn3_234

><td class="source">  }<br></td></tr
><tr
id=sl_svn3_235

><td class="source">    <br></td></tr
><tr
id=sl_svn3_236

><td class="source">  /**<br></td></tr
><tr
id=sl_svn3_237

><td class="source">   * Gets singleton instance of FirePHP<br></td></tr
><tr
id=sl_svn3_238

><td class="source">   *<br></td></tr
><tr
id=sl_svn3_239

><td class="source">   * @param boolean $AutoCreate<br></td></tr
><tr
id=sl_svn3_240

><td class="source">   * @return FirePHP<br></td></tr
><tr
id=sl_svn3_241

><td class="source">   */<br></td></tr
><tr
id=sl_svn3_242

><td class="source">  public static function getInstance($AutoCreate=false) {<br></td></tr
><tr
id=sl_svn3_243

><td class="source">    if($AutoCreate===true &amp;&amp; !self::$instance) {<br></td></tr
><tr
id=sl_svn3_244

><td class="source">      self::init();<br></td></tr
><tr
id=sl_svn3_245

><td class="source">    }<br></td></tr
><tr
id=sl_svn3_246

><td class="source">    return self::$instance;<br></td></tr
><tr
id=sl_svn3_247

><td class="source">  }<br></td></tr
><tr
id=sl_svn3_248

><td class="source">   <br></td></tr
><tr
id=sl_svn3_249

><td class="source">  /**<br></td></tr
><tr
id=sl_svn3_250

><td class="source">   * Creates FirePHP object and stores it for singleton access<br></td></tr
><tr
id=sl_svn3_251

><td class="source">   *<br></td></tr
><tr
id=sl_svn3_252

><td class="source">   * @return FirePHP<br></td></tr
><tr
id=sl_svn3_253

><td class="source">   */<br></td></tr
><tr
id=sl_svn3_254

><td class="source">  public static function init() {<br></td></tr
><tr
id=sl_svn3_255

><td class="source">    return self::$instance = new self();<br></td></tr
><tr
id=sl_svn3_256

><td class="source">  }<br></td></tr
><tr
id=sl_svn3_257

><td class="source">  <br></td></tr
><tr
id=sl_svn3_258

><td class="source">  /**<br></td></tr
><tr
id=sl_svn3_259

><td class="source">   * Enable and disable logging to Firebug<br></td></tr
><tr
id=sl_svn3_260

><td class="source">   * <br></td></tr
><tr
id=sl_svn3_261

><td class="source">   * @param boolean $Enabled TRUE to enable, FALSE to disable<br></td></tr
><tr
id=sl_svn3_262

><td class="source">   * @return void<br></td></tr
><tr
id=sl_svn3_263

><td class="source">   */<br></td></tr
><tr
id=sl_svn3_264

><td class="source">  public function setEnabled($Enabled) {<br></td></tr
><tr
id=sl_svn3_265

><td class="source">    $this-&gt;enabled = $Enabled;<br></td></tr
><tr
id=sl_svn3_266

><td class="source">  }<br></td></tr
><tr
id=sl_svn3_267

><td class="source">  <br></td></tr
><tr
id=sl_svn3_268

><td class="source">  /**<br></td></tr
><tr
id=sl_svn3_269

><td class="source">   * Check if logging is enabled<br></td></tr
><tr
id=sl_svn3_270

><td class="source">   * <br></td></tr
><tr
id=sl_svn3_271

><td class="source">   * @return boolean TRUE if enabled<br></td></tr
><tr
id=sl_svn3_272

><td class="source">   */<br></td></tr
><tr
id=sl_svn3_273

><td class="source">  public function getEnabled() {<br></td></tr
><tr
id=sl_svn3_274

><td class="source">    return $this-&gt;enabled;<br></td></tr
><tr
id=sl_svn3_275

><td class="source">  }<br></td></tr
><tr
id=sl_svn3_276

><td class="source">  <br></td></tr
><tr
id=sl_svn3_277

><td class="source">  /**<br></td></tr
><tr
id=sl_svn3_278

><td class="source">   * Specify a filter to be used when encoding an object<br></td></tr
><tr
id=sl_svn3_279

><td class="source">   * <br></td></tr
><tr
id=sl_svn3_280

><td class="source">   * Filters are used to exclude object members.<br></td></tr
><tr
id=sl_svn3_281

><td class="source">   * <br></td></tr
><tr
id=sl_svn3_282

><td class="source">   * @param string $Class The class name of the object<br></td></tr
><tr
id=sl_svn3_283

><td class="source">   * @param array $Filter An array of members to exclude<br></td></tr
><tr
id=sl_svn3_284

><td class="source">   * @return void<br></td></tr
><tr
id=sl_svn3_285

><td class="source">   */<br></td></tr
><tr
id=sl_svn3_286

><td class="source">  public function setObjectFilter($Class, $Filter) {<br></td></tr
><tr
id=sl_svn3_287

><td class="source">    $this-&gt;objectFilters[strtolower($Class)] = $Filter;<br></td></tr
><tr
id=sl_svn3_288

><td class="source">  }<br></td></tr
><tr
id=sl_svn3_289

><td class="source">  <br></td></tr
><tr
id=sl_svn3_290

><td class="source">  /**<br></td></tr
><tr
id=sl_svn3_291

><td class="source">   * Set some options for the library<br></td></tr
><tr
id=sl_svn3_292

><td class="source">   * <br></td></tr
><tr
id=sl_svn3_293

><td class="source">   * Options:<br></td></tr
><tr
id=sl_svn3_294

><td class="source">   *  - maxObjectDepth: The maximum depth to traverse objects (default: 10)<br></td></tr
><tr
id=sl_svn3_295

><td class="source">   *  - maxArrayDepth: The maximum depth to traverse arrays (default: 20)<br></td></tr
><tr
id=sl_svn3_296

><td class="source">   *  - useNativeJsonEncode: If true will use json_encode() (default: true)<br></td></tr
><tr
id=sl_svn3_297

><td class="source">   *  - includeLineNumbers: If true will include line numbers and filenames (default: true)<br></td></tr
><tr
id=sl_svn3_298

><td class="source">   * <br></td></tr
><tr
id=sl_svn3_299

><td class="source">   * @param array $Options The options to be set<br></td></tr
><tr
id=sl_svn3_300

><td class="source">   * @return void<br></td></tr
><tr
id=sl_svn3_301

><td class="source">   */<br></td></tr
><tr
id=sl_svn3_302

><td class="source">  public function setOptions($Options) {<br></td></tr
><tr
id=sl_svn3_303

><td class="source">    $this-&gt;options = array_merge($this-&gt;options,$Options);<br></td></tr
><tr
id=sl_svn3_304

><td class="source">  }<br></td></tr
><tr
id=sl_svn3_305

><td class="source">  <br></td></tr
><tr
id=sl_svn3_306

><td class="source">  /**<br></td></tr
><tr
id=sl_svn3_307

><td class="source">   * Get options from the library<br></td></tr
><tr
id=sl_svn3_308

><td class="source">   *<br></td></tr
><tr
id=sl_svn3_309

><td class="source">   * @return array The currently set options<br></td></tr
><tr
id=sl_svn3_310

><td class="source">   */<br></td></tr
><tr
id=sl_svn3_311

><td class="source">  public function getOptions() {<br></td></tr
><tr
id=sl_svn3_312

><td class="source">    return $this-&gt;options;<br></td></tr
><tr
id=sl_svn3_313

><td class="source">  }<br></td></tr
><tr
id=sl_svn3_314

><td class="source">  <br></td></tr
><tr
id=sl_svn3_315

><td class="source">  /**<br></td></tr
><tr
id=sl_svn3_316

><td class="source">   * Register FirePHP as your error handler<br></td></tr
><tr
id=sl_svn3_317

><td class="source">   * <br></td></tr
><tr
id=sl_svn3_318

><td class="source">   * Will throw exceptions for each php error.<br></td></tr
><tr
id=sl_svn3_319

><td class="source">   * <br></td></tr
><tr
id=sl_svn3_320

><td class="source">   * @return mixed Returns a string containing the previously defined error handler (if any)<br></td></tr
><tr
id=sl_svn3_321

><td class="source">   */<br></td></tr
><tr
id=sl_svn3_322

><td class="source">  public function registerErrorHandler($throwErrorExceptions=true)<br></td></tr
><tr
id=sl_svn3_323

><td class="source">  {<br></td></tr
><tr
id=sl_svn3_324

><td class="source">    //NOTE: The following errors will not be caught by this error handler:<br></td></tr
><tr
id=sl_svn3_325

><td class="source">    //      E_ERROR, E_PARSE, E_CORE_ERROR,<br></td></tr
><tr
id=sl_svn3_326

><td class="source">    //      E_CORE_WARNING, E_COMPILE_ERROR,<br></td></tr
><tr
id=sl_svn3_327

><td class="source">    //      E_COMPILE_WARNING, E_STRICT<br></td></tr
><tr
id=sl_svn3_328

><td class="source">    <br></td></tr
><tr
id=sl_svn3_329

><td class="source">    $this-&gt;throwErrorExceptions = $throwErrorExceptions;<br></td></tr
><tr
id=sl_svn3_330

><td class="source">    <br></td></tr
><tr
id=sl_svn3_331

><td class="source">    return set_error_handler(array($this,&#39;errorHandler&#39;));     <br></td></tr
><tr
id=sl_svn3_332

><td class="source">  }<br></td></tr
><tr
id=sl_svn3_333

><td class="source"><br></td></tr
><tr
id=sl_svn3_334

><td class="source">  /**<br></td></tr
><tr
id=sl_svn3_335

><td class="source">   * FirePHP&#39;s error handler<br></td></tr
><tr
id=sl_svn3_336

><td class="source">   * <br></td></tr
><tr
id=sl_svn3_337

><td class="source">   * Throws exception for each php error that will occur.<br></td></tr
><tr
id=sl_svn3_338

><td class="source">   *<br></td></tr
><tr
id=sl_svn3_339

><td class="source">   * @param int $errno<br></td></tr
><tr
id=sl_svn3_340

><td class="source">   * @param string $errstr<br></td></tr
><tr
id=sl_svn3_341

><td class="source">   * @param string $errfile<br></td></tr
><tr
id=sl_svn3_342

><td class="source">   * @param int $errline<br></td></tr
><tr
id=sl_svn3_343

><td class="source">   * @param array $errcontext<br></td></tr
><tr
id=sl_svn3_344

><td class="source">   */<br></td></tr
><tr
id=sl_svn3_345

><td class="source">  public function errorHandler($errno, $errstr, $errfile, $errline, $errcontext)<br></td></tr
><tr
id=sl_svn3_346

><td class="source">  {<br></td></tr
><tr
id=sl_svn3_347

><td class="source">    // Don&#39;t throw exception if error reporting is switched off<br></td></tr
><tr
id=sl_svn3_348

><td class="source">    if (error_reporting() == 0) {<br></td></tr
><tr
id=sl_svn3_349

><td class="source">      return;<br></td></tr
><tr
id=sl_svn3_350

><td class="source">    }<br></td></tr
><tr
id=sl_svn3_351

><td class="source">    // Only throw exceptions for errors we are asking for<br></td></tr
><tr
id=sl_svn3_352

><td class="source">    if (error_reporting() &amp; $errno) {<br></td></tr
><tr
id=sl_svn3_353

><td class="source"><br></td></tr
><tr
id=sl_svn3_354

><td class="source">      $exception = new ErrorException($errstr, 0, $errno, $errfile, $errline);<br></td></tr
><tr
id=sl_svn3_355

><td class="source">      if($this-&gt;throwErrorExceptions) {<br></td></tr
><tr
id=sl_svn3_356

><td class="source">        throw $exception;<br></td></tr
><tr
id=sl_svn3_357

><td class="source">      } else {<br></td></tr
><tr
id=sl_svn3_358

><td class="source">        $this-&gt;fb($exception);<br></td></tr
><tr
id=sl_svn3_359

><td class="source">      }<br></td></tr
><tr
id=sl_svn3_360

><td class="source">    }<br></td></tr
><tr
id=sl_svn3_361

><td class="source">  }<br></td></tr
><tr
id=sl_svn3_362

><td class="source">  <br></td></tr
><tr
id=sl_svn3_363

><td class="source">  /**<br></td></tr
><tr
id=sl_svn3_364

><td class="source">   * Register FirePHP as your exception handler<br></td></tr
><tr
id=sl_svn3_365

><td class="source">   * <br></td></tr
><tr
id=sl_svn3_366

><td class="source">   * @return mixed Returns the name of the previously defined exception handler,<br></td></tr
><tr
id=sl_svn3_367

><td class="source">   *               or NULL on error.<br></td></tr
><tr
id=sl_svn3_368

><td class="source">   *               If no previous handler was defined, NULL is also returned.<br></td></tr
><tr
id=sl_svn3_369

><td class="source">   */<br></td></tr
><tr
id=sl_svn3_370

><td class="source">  public function registerExceptionHandler()<br></td></tr
><tr
id=sl_svn3_371

><td class="source">  {<br></td></tr
><tr
id=sl_svn3_372

><td class="source">    return set_exception_handler(array($this,&#39;exceptionHandler&#39;));     <br></td></tr
><tr
id=sl_svn3_373

><td class="source">  }<br></td></tr
><tr
id=sl_svn3_374

><td class="source">  <br></td></tr
><tr
id=sl_svn3_375

><td class="source">  /**<br></td></tr
><tr
id=sl_svn3_376

><td class="source">   * FirePHP&#39;s exception handler<br></td></tr
><tr
id=sl_svn3_377

><td class="source">   * <br></td></tr
><tr
id=sl_svn3_378

><td class="source">   * Logs all exceptions to your firebug console and then stops the script.<br></td></tr
><tr
id=sl_svn3_379

><td class="source">   *<br></td></tr
><tr
id=sl_svn3_380

><td class="source">   * @param Exception $Exception<br></td></tr
><tr
id=sl_svn3_381

><td class="source">   * @throws Exception<br></td></tr
><tr
id=sl_svn3_382

><td class="source">   */<br></td></tr
><tr
id=sl_svn3_383

><td class="source">  function exceptionHandler($Exception) {<br></td></tr
><tr
id=sl_svn3_384

><td class="source">    <br></td></tr
><tr
id=sl_svn3_385

><td class="source">    $this-&gt;inExceptionHandler = true;<br></td></tr
><tr
id=sl_svn3_386

><td class="source"><br></td></tr
><tr
id=sl_svn3_387

><td class="source">    header(&#39;HTTP/1.1 500 Internal Server Error&#39;);<br></td></tr
><tr
id=sl_svn3_388

><td class="source"><br></td></tr
><tr
id=sl_svn3_389

><td class="source">    $this-&gt;fb($Exception);<br></td></tr
><tr
id=sl_svn3_390

><td class="source">    <br></td></tr
><tr
id=sl_svn3_391

><td class="source">    $this-&gt;inExceptionHandler = false;<br></td></tr
><tr
id=sl_svn3_392

><td class="source">  }<br></td></tr
><tr
id=sl_svn3_393

><td class="source">  <br></td></tr
><tr
id=sl_svn3_394

><td class="source">  /**<br></td></tr
><tr
id=sl_svn3_395

><td class="source">   * Register FirePHP driver as your assert callback<br></td></tr
><tr
id=sl_svn3_396

><td class="source">   * <br></td></tr
><tr
id=sl_svn3_397

><td class="source">   * @param boolean $convertAssertionErrorsToExceptions<br></td></tr
><tr
id=sl_svn3_398

><td class="source">   * @param boolean $throwAssertionExceptions<br></td></tr
><tr
id=sl_svn3_399

><td class="source">   * @return mixed Returns the original setting or FALSE on errors<br></td></tr
><tr
id=sl_svn3_400

><td class="source">   */<br></td></tr
><tr
id=sl_svn3_401

><td class="source">  public function registerAssertionHandler($convertAssertionErrorsToExceptions=true, $throwAssertionExceptions=false)<br></td></tr
><tr
id=sl_svn3_402

><td class="source">  {<br></td></tr
><tr
id=sl_svn3_403

><td class="source">    $this-&gt;convertAssertionErrorsToExceptions = $convertAssertionErrorsToExceptions;<br></td></tr
><tr
id=sl_svn3_404

><td class="source">    $this-&gt;throwAssertionExceptions = $throwAssertionExceptions;<br></td></tr
><tr
id=sl_svn3_405

><td class="source">    <br></td></tr
><tr
id=sl_svn3_406

><td class="source">    if($throwAssertionExceptions &amp;&amp; !$convertAssertionErrorsToExceptions) {<br></td></tr
><tr
id=sl_svn3_407

><td class="source">      throw $this-&gt;newException(&#39;Cannot throw assertion exceptions as assertion errors are not being converted to exceptions!&#39;);<br></td></tr
><tr
id=sl_svn3_408

><td class="source">    }<br></td></tr
><tr
id=sl_svn3_409

><td class="source">    <br></td></tr
><tr
id=sl_svn3_410

><td class="source">    return assert_options(ASSERT_CALLBACK, array($this, &#39;assertionHandler&#39;));<br></td></tr
><tr
id=sl_svn3_411

><td class="source">  }<br></td></tr
><tr
id=sl_svn3_412

><td class="source">  <br></td></tr
><tr
id=sl_svn3_413

><td class="source">  /**<br></td></tr
><tr
id=sl_svn3_414

><td class="source">   * FirePHP&#39;s assertion handler<br></td></tr
><tr
id=sl_svn3_415

><td class="source">   *<br></td></tr
><tr
id=sl_svn3_416

><td class="source">   * Logs all assertions to your firebug console and then stops the script.<br></td></tr
><tr
id=sl_svn3_417

><td class="source">   *<br></td></tr
><tr
id=sl_svn3_418

><td class="source">   * @param string $file File source of assertion<br></td></tr
><tr
id=sl_svn3_419

><td class="source">   * @param int    $line Line source of assertion<br></td></tr
><tr
id=sl_svn3_420

><td class="source">   * @param mixed  $code Assertion code<br></td></tr
><tr
id=sl_svn3_421

><td class="source">   */<br></td></tr
><tr
id=sl_svn3_422

><td class="source">  public function assertionHandler($file, $line, $code)<br></td></tr
><tr
id=sl_svn3_423

><td class="source">  {<br></td></tr
><tr
id=sl_svn3_424

><td class="source"><br></td></tr
><tr
id=sl_svn3_425

><td class="source">    if($this-&gt;convertAssertionErrorsToExceptions) {<br></td></tr
><tr
id=sl_svn3_426

><td class="source">      <br></td></tr
><tr
id=sl_svn3_427

><td class="source">      $exception = new ErrorException(&#39;Assertion Failed - Code[ &#39;.$code.&#39; ]&#39;, 0, null, $file, $line);<br></td></tr
><tr
id=sl_svn3_428

><td class="source"><br></td></tr
><tr
id=sl_svn3_429

><td class="source">      if($this-&gt;throwAssertionExceptions) {<br></td></tr
><tr
id=sl_svn3_430

><td class="source">        throw $exception;<br></td></tr
><tr
id=sl_svn3_431

><td class="source">      } else {<br></td></tr
><tr
id=sl_svn3_432

><td class="source">        $this-&gt;fb($exception);<br></td></tr
><tr
id=sl_svn3_433

><td class="source">      }<br></td></tr
><tr
id=sl_svn3_434

><td class="source">    <br></td></tr
><tr
id=sl_svn3_435

><td class="source">    } else {<br></td></tr
><tr
id=sl_svn3_436

><td class="source">    <br></td></tr
><tr
id=sl_svn3_437

><td class="source">      $this-&gt;fb($code, &#39;Assertion Failed&#39;, FirePHP::ERROR, array(&#39;File&#39;=&gt;$file,&#39;Line&#39;=&gt;$line));<br></td></tr
><tr
id=sl_svn3_438

><td class="source">    <br></td></tr
><tr
id=sl_svn3_439

><td class="source">    }<br></td></tr
><tr
id=sl_svn3_440

><td class="source">  }  <br></td></tr
><tr
id=sl_svn3_441

><td class="source">  <br></td></tr
><tr
id=sl_svn3_442

><td class="source">  /**<br></td></tr
><tr
id=sl_svn3_443

><td class="source">   * Set custom processor url for FirePHP<br></td></tr
><tr
id=sl_svn3_444

><td class="source">   *<br></td></tr
><tr
id=sl_svn3_445

><td class="source">   * @param string $URL<br></td></tr
><tr
id=sl_svn3_446

><td class="source">   */    <br></td></tr
><tr
id=sl_svn3_447

><td class="source">  public function setProcessorUrl($URL)<br></td></tr
><tr
id=sl_svn3_448

><td class="source">  {<br></td></tr
><tr
id=sl_svn3_449

><td class="source">    $this-&gt;setHeader(&#39;X-FirePHP-ProcessorURL&#39;, $URL);<br></td></tr
><tr
id=sl_svn3_450

><td class="source">  }<br></td></tr
><tr
id=sl_svn3_451

><td class="source"><br></td></tr
><tr
id=sl_svn3_452

><td class="source">  /**<br></td></tr
><tr
id=sl_svn3_453

><td class="source">   * Set custom renderer url for FirePHP<br></td></tr
><tr
id=sl_svn3_454

><td class="source">   *<br></td></tr
><tr
id=sl_svn3_455

><td class="source">   * @param string $URL<br></td></tr
><tr
id=sl_svn3_456

><td class="source">   */<br></td></tr
><tr
id=sl_svn3_457

><td class="source">  public function setRendererUrl($URL)<br></td></tr
><tr
id=sl_svn3_458

><td class="source">  {<br></td></tr
><tr
id=sl_svn3_459

><td class="source">    $this-&gt;setHeader(&#39;X-FirePHP-RendererURL&#39;, $URL);<br></td></tr
><tr
id=sl_svn3_460

><td class="source">  }<br></td></tr
><tr
id=sl_svn3_461

><td class="source">  <br></td></tr
><tr
id=sl_svn3_462

><td class="source">  /**<br></td></tr
><tr
id=sl_svn3_463

><td class="source">   * Start a group for following messages.<br></td></tr
><tr
id=sl_svn3_464

><td class="source">   * <br></td></tr
><tr
id=sl_svn3_465

><td class="source">   * Options:<br></td></tr
><tr
id=sl_svn3_466

><td class="source">   *   Collapsed: [true|false]<br></td></tr
><tr
id=sl_svn3_467

><td class="source">   *   Color:     [#RRGGBB|ColorName]<br></td></tr
><tr
id=sl_svn3_468

><td class="source">   *<br></td></tr
><tr
id=sl_svn3_469

><td class="source">   * @param string $Name<br></td></tr
><tr
id=sl_svn3_470

><td class="source">   * @param array $Options OPTIONAL Instructions on how to log the group<br></td></tr
><tr
id=sl_svn3_471

><td class="source">   * @return true<br></td></tr
><tr
id=sl_svn3_472

><td class="source">   * @throws Exception<br></td></tr
><tr
id=sl_svn3_473

><td class="source">   */<br></td></tr
><tr
id=sl_svn3_474

><td class="source">  public function group($Name, $Options=null) {<br></td></tr
><tr
id=sl_svn3_475

><td class="source">    <br></td></tr
><tr
id=sl_svn3_476

><td class="source">    if(!$Name) {<br></td></tr
><tr
id=sl_svn3_477

><td class="source">      throw $this-&gt;newException(&#39;You must specify a label for the group!&#39;);<br></td></tr
><tr
id=sl_svn3_478

><td class="source">    }<br></td></tr
><tr
id=sl_svn3_479

><td class="source">    <br></td></tr
><tr
id=sl_svn3_480

><td class="source">    if($Options) {<br></td></tr
><tr
id=sl_svn3_481

><td class="source">      if(!is_array($Options)) {<br></td></tr
><tr
id=sl_svn3_482

><td class="source">        throw $this-&gt;newException(&#39;Options must be defined as an array!&#39;);<br></td></tr
><tr
id=sl_svn3_483

><td class="source">      }<br></td></tr
><tr
id=sl_svn3_484

><td class="source">      if(array_key_exists(&#39;Collapsed&#39;, $Options)) {<br></td></tr
><tr
id=sl_svn3_485

><td class="source">        $Options[&#39;Collapsed&#39;] = ($Options[&#39;Collapsed&#39;])?&#39;true&#39;:&#39;false&#39;;<br></td></tr
><tr
id=sl_svn3_486

><td class="source">      }<br></td></tr
><tr
id=sl_svn3_487

><td class="source">    }<br></td></tr
><tr
id=sl_svn3_488

><td class="source">    <br></td></tr
><tr
id=sl_svn3_489

><td class="source">    return $this-&gt;fb(null, $Name, FirePHP::GROUP_START, $Options);<br></td></tr
><tr
id=sl_svn3_490

><td class="source">  }<br></td></tr
><tr
id=sl_svn3_491

><td class="source">  <br></td></tr
><tr
id=sl_svn3_492

><td class="source">  /**<br></td></tr
><tr
id=sl_svn3_493

><td class="source">   * Ends a group you have started before<br></td></tr
><tr
id=sl_svn3_494

><td class="source">   *<br></td></tr
><tr
id=sl_svn3_495

><td class="source">   * @return true<br></td></tr
><tr
id=sl_svn3_496

><td class="source">   * @throws Exception<br></td></tr
><tr
id=sl_svn3_497

><td class="source">   */<br></td></tr
><tr
id=sl_svn3_498

><td class="source">  public function groupEnd() {<br></td></tr
><tr
id=sl_svn3_499

><td class="source">    return $this-&gt;fb(null, null, FirePHP::GROUP_END);<br></td></tr
><tr
id=sl_svn3_500

><td class="source">  }<br></td></tr
><tr
id=sl_svn3_501

><td class="source"><br></td></tr
><tr
id=sl_svn3_502

><td class="source">  /**<br></td></tr
><tr
id=sl_svn3_503

><td class="source">   * Log object with label to firebug console<br></td></tr
><tr
id=sl_svn3_504

><td class="source">   *<br></td></tr
><tr
id=sl_svn3_505

><td class="source">   * @see FirePHP::LOG<br></td></tr
><tr
id=sl_svn3_506

><td class="source">   * @param mixes $Object<br></td></tr
><tr
id=sl_svn3_507

><td class="source">   * @param string $Label<br></td></tr
><tr
id=sl_svn3_508

><td class="source">   * @return true<br></td></tr
><tr
id=sl_svn3_509

><td class="source">   * @throws Exception<br></td></tr
><tr
id=sl_svn3_510

><td class="source">   */<br></td></tr
><tr
id=sl_svn3_511

><td class="source">  public function log($Object, $Label=null) {<br></td></tr
><tr
id=sl_svn3_512

><td class="source">    return $this-&gt;fb($Object, $Label, FirePHP::LOG);<br></td></tr
><tr
id=sl_svn3_513

><td class="source">  } <br></td></tr
><tr
id=sl_svn3_514

><td class="source"><br></td></tr
><tr
id=sl_svn3_515

><td class="source">  /**<br></td></tr
><tr
id=sl_svn3_516

><td class="source">   * Log object with label to firebug console<br></td></tr
><tr
id=sl_svn3_517

><td class="source">   *<br></td></tr
><tr
id=sl_svn3_518

><td class="source">   * @see FirePHP::INFO<br></td></tr
><tr
id=sl_svn3_519

><td class="source">   * @param mixes $Object<br></td></tr
><tr
id=sl_svn3_520

><td class="source">   * @param string $Label<br></td></tr
><tr
id=sl_svn3_521

><td class="source">   * @return true<br></td></tr
><tr
id=sl_svn3_522

><td class="source">   * @throws Exception<br></td></tr
><tr
id=sl_svn3_523

><td class="source">   */<br></td></tr
><tr
id=sl_svn3_524

><td class="source">  public function info($Object, $Label=null) {<br></td></tr
><tr
id=sl_svn3_525

><td class="source">    return $this-&gt;fb($Object, $Label, FirePHP::INFO);<br></td></tr
><tr
id=sl_svn3_526

><td class="source">  } <br></td></tr
><tr
id=sl_svn3_527

><td class="source"><br></td></tr
><tr
id=sl_svn3_528

><td class="source">  /**<br></td></tr
><tr
id=sl_svn3_529

><td class="source">   * Log object with label to firebug console<br></td></tr
><tr
id=sl_svn3_530

><td class="source">   *<br></td></tr
><tr
id=sl_svn3_531

><td class="source">   * @see FirePHP::WARN<br></td></tr
><tr
id=sl_svn3_532

><td class="source">   * @param mixes $Object<br></td></tr
><tr
id=sl_svn3_533

><td class="source">   * @param string $Label<br></td></tr
><tr
id=sl_svn3_534

><td class="source">   * @return true<br></td></tr
><tr
id=sl_svn3_535

><td class="source">   * @throws Exception<br></td></tr
><tr
id=sl_svn3_536

><td class="source">   */<br></td></tr
><tr
id=sl_svn3_537

><td class="source">  public function warn($Object, $Label=null) {<br></td></tr
><tr
id=sl_svn3_538

><td class="source">    return $this-&gt;fb($Object, $Label, FirePHP::WARN);<br></td></tr
><tr
id=sl_svn3_539

><td class="source">  } <br></td></tr
><tr
id=sl_svn3_540

><td class="source"><br></td></tr
><tr
id=sl_svn3_541

><td class="source">  /**<br></td></tr
><tr
id=sl_svn3_542

><td class="source">   * Log object with label to firebug console<br></td></tr
><tr
id=sl_svn3_543

><td class="source">   *<br></td></tr
><tr
id=sl_svn3_544

><td class="source">   * @see FirePHP::ERROR<br></td></tr
><tr
id=sl_svn3_545

><td class="source">   * @param mixes $Object<br></td></tr
><tr
id=sl_svn3_546

><td class="source">   * @param string $Label<br></td></tr
><tr
id=sl_svn3_547

><td class="source">   * @return true<br></td></tr
><tr
id=sl_svn3_548

><td class="source">   * @throws Exception<br></td></tr
><tr
id=sl_svn3_549

><td class="source">   */<br></td></tr
><tr
id=sl_svn3_550

><td class="source">  public function error($Object, $Label=null) {<br></td></tr
><tr
id=sl_svn3_551

><td class="source">    return $this-&gt;fb($Object, $Label, FirePHP::ERROR);<br></td></tr
><tr
id=sl_svn3_552

><td class="source">  } <br></td></tr
><tr
id=sl_svn3_553

><td class="source"><br></td></tr
><tr
id=sl_svn3_554

><td class="source">  /**<br></td></tr
><tr
id=sl_svn3_555

><td class="source">   * Dumps key and variable to firebug server panel<br></td></tr
><tr
id=sl_svn3_556

><td class="source">   *<br></td></tr
><tr
id=sl_svn3_557

><td class="source">   * @see FirePHP::DUMP<br></td></tr
><tr
id=sl_svn3_558

><td class="source">   * @param string $Key<br></td></tr
><tr
id=sl_svn3_559

><td class="source">   * @param mixed $Variable<br></td></tr
><tr
id=sl_svn3_560

><td class="source">   * @return true<br></td></tr
><tr
id=sl_svn3_561

><td class="source">   * @throws Exception<br></td></tr
><tr
id=sl_svn3_562

><td class="source">   */<br></td></tr
><tr
id=sl_svn3_563

><td class="source">  public function dump($Key, $Variable) {<br></td></tr
><tr
id=sl_svn3_564

><td class="source">    return $this-&gt;fb($Variable, $Key, FirePHP::DUMP);<br></td></tr
><tr
id=sl_svn3_565

><td class="source">  }<br></td></tr
><tr
id=sl_svn3_566

><td class="source">  <br></td></tr
><tr
id=sl_svn3_567

><td class="source">  /**<br></td></tr
><tr
id=sl_svn3_568

><td class="source">   * Log a trace in the firebug console<br></td></tr
><tr
id=sl_svn3_569

><td class="source">   *<br></td></tr
><tr
id=sl_svn3_570

><td class="source">   * @see FirePHP::TRACE<br></td></tr
><tr
id=sl_svn3_571

><td class="source">   * @param string $Label<br></td></tr
><tr
id=sl_svn3_572

><td class="source">   * @return true<br></td></tr
><tr
id=sl_svn3_573

><td class="source">   * @throws Exception<br></td></tr
><tr
id=sl_svn3_574

><td class="source">   */<br></td></tr
><tr
id=sl_svn3_575

><td class="source">  public function trace($Label) {<br></td></tr
><tr
id=sl_svn3_576

><td class="source">    return $this-&gt;fb($Label, FirePHP::TRACE);<br></td></tr
><tr
id=sl_svn3_577

><td class="source">  } <br></td></tr
><tr
id=sl_svn3_578

><td class="source"><br></td></tr
><tr
id=sl_svn3_579

><td class="source">  /**<br></td></tr
><tr
id=sl_svn3_580

><td class="source">   * Log a table in the firebug console<br></td></tr
><tr
id=sl_svn3_581

><td class="source">   *<br></td></tr
><tr
id=sl_svn3_582

><td class="source">   * @see FirePHP::TABLE<br></td></tr
><tr
id=sl_svn3_583

><td class="source">   * @param string $Label<br></td></tr
><tr
id=sl_svn3_584

><td class="source">   * @param string $Table<br></td></tr
><tr
id=sl_svn3_585

><td class="source">   * @return true<br></td></tr
><tr
id=sl_svn3_586

><td class="source">   * @throws Exception<br></td></tr
><tr
id=sl_svn3_587

><td class="source">   */<br></td></tr
><tr
id=sl_svn3_588

><td class="source">  public function table($Label, $Table) {<br></td></tr
><tr
id=sl_svn3_589

><td class="source">    return $this-&gt;fb($Table, $Label, FirePHP::TABLE);<br></td></tr
><tr
id=sl_svn3_590

><td class="source">  }<br></td></tr
><tr
id=sl_svn3_591

><td class="source">  <br></td></tr
><tr
id=sl_svn3_592

><td class="source">  /**<br></td></tr
><tr
id=sl_svn3_593

><td class="source">   * Check if FirePHP is installed on client<br></td></tr
><tr
id=sl_svn3_594

><td class="source">   *<br></td></tr
><tr
id=sl_svn3_595

><td class="source">   * @return boolean<br></td></tr
><tr
id=sl_svn3_596

><td class="source">   */<br></td></tr
><tr
id=sl_svn3_597

><td class="source">  public function detectClientExtension() {<br></td></tr
><tr
id=sl_svn3_598

><td class="source">    /* Check if FirePHP is installed on client */<br></td></tr
><tr
id=sl_svn3_599

><td class="source">    if(!@preg_match_all(&#39;/\sFirePHP\/([\.|\d]*)\s?/si&#39;,$this-&gt;getUserAgent(),$m) ||<br></td></tr
><tr
id=sl_svn3_600

><td class="source">       !version_compare($m[1][0],&#39;0.0.6&#39;,&#39;&gt;=&#39;)) {<br></td></tr
><tr
id=sl_svn3_601

><td class="source">      return false;<br></td></tr
><tr
id=sl_svn3_602

><td class="source">    }<br></td></tr
><tr
id=sl_svn3_603

><td class="source">    return true;    <br></td></tr
><tr
id=sl_svn3_604

><td class="source">  }<br></td></tr
><tr
id=sl_svn3_605

><td class="source"> <br></td></tr
><tr
id=sl_svn3_606

><td class="source">  /**<br></td></tr
><tr
id=sl_svn3_607

><td class="source">   * Log varible to Firebug<br></td></tr
><tr
id=sl_svn3_608

><td class="source">   * <br></td></tr
><tr
id=sl_svn3_609

><td class="source">   * @see http://www.firephp.org/Wiki/Reference/Fb<br></td></tr
><tr
id=sl_svn3_610

><td class="source">   * @param mixed $Object The variable to be logged<br></td></tr
><tr
id=sl_svn3_611

><td class="source">   * @return true Return TRUE if message was added to headers, FALSE otherwise<br></td></tr
><tr
id=sl_svn3_612

><td class="source">   * @throws Exception<br></td></tr
><tr
id=sl_svn3_613

><td class="source">   */<br></td></tr
><tr
id=sl_svn3_614

><td class="source">  public function fb($Object) {<br></td></tr
><tr
id=sl_svn3_615

><td class="source">  <br></td></tr
><tr
id=sl_svn3_616

><td class="source">    if(!$this-&gt;enabled) {<br></td></tr
><tr
id=sl_svn3_617

><td class="source">      return false;<br></td></tr
><tr
id=sl_svn3_618

><td class="source">    }<br></td></tr
><tr
id=sl_svn3_619

><td class="source">  <br></td></tr
><tr
id=sl_svn3_620

><td class="source">    if (headers_sent($filename, $linenum)) {<br></td></tr
><tr
id=sl_svn3_621

><td class="source">      // If we are logging from within the exception handler we cannot throw another exception<br></td></tr
><tr
id=sl_svn3_622

><td class="source">      if($this-&gt;inExceptionHandler) {<br></td></tr
><tr
id=sl_svn3_623

><td class="source">        // Simply echo the error out to the page<br></td></tr
><tr
id=sl_svn3_624

><td class="source">        echo &#39;&lt;div style=&quot;border: 2px solid red; font-family: Arial; font-size: 12px; background-color: lightgray; padding: 5px;&quot;&gt;&lt;span style=&quot;color: red; font-weight: bold;&quot;&gt;FirePHP ERROR:&lt;/span&gt; Headers already sent in &lt;b&gt;&#39;.$filename.&#39;&lt;/b&gt; on line &lt;b&gt;&#39;.$linenum.&#39;&lt;/b&gt;. Cannot send log data to FirePHP. You must have Output Buffering enabled via ob_start() or output_buffering ini directive.&lt;/div&gt;&#39;;<br></td></tr
><tr
id=sl_svn3_625

><td class="source">      } else {<br></td></tr
><tr
id=sl_svn3_626

><td class="source">        throw $this-&gt;newException(&#39;Headers already sent in &#39;.$filename.&#39; on line &#39;.$linenum.&#39;. Cannot send log data to FirePHP. You must have Output Buffering enabled via ob_start() or output_buffering ini directive.&#39;);<br></td></tr
><tr
id=sl_svn3_627

><td class="source">      }<br></td></tr
><tr
id=sl_svn3_628

><td class="source">    }<br></td></tr
><tr
id=sl_svn3_629

><td class="source">  <br></td></tr
><tr
id=sl_svn3_630

><td class="source">    $Type = null;<br></td></tr
><tr
id=sl_svn3_631

><td class="source">    $Label = null;<br></td></tr
><tr
id=sl_svn3_632

><td class="source">    $Options = array();<br></td></tr
><tr
id=sl_svn3_633

><td class="source">  <br></td></tr
><tr
id=sl_svn3_634

><td class="source">    if(func_num_args()==1) {<br></td></tr
><tr
id=sl_svn3_635

><td class="source">    } else<br></td></tr
><tr
id=sl_svn3_636

><td class="source">    if(func_num_args()==2) {<br></td></tr
><tr
id=sl_svn3_637

><td class="source">      switch(func_get_arg(1)) {<br></td></tr
><tr
id=sl_svn3_638

><td class="source">        case self::LOG:<br></td></tr
><tr
id=sl_svn3_639

><td class="source">        case self::INFO:<br></td></tr
><tr
id=sl_svn3_640

><td class="source">        case self::WARN:<br></td></tr
><tr
id=sl_svn3_641

><td class="source">        case self::ERROR:<br></td></tr
><tr
id=sl_svn3_642

><td class="source">        case self::DUMP:<br></td></tr
><tr
id=sl_svn3_643

><td class="source">        case self::TRACE:<br></td></tr
><tr
id=sl_svn3_644

><td class="source">        case self::EXCEPTION:<br></td></tr
><tr
id=sl_svn3_645

><td class="source">        case self::TABLE:<br></td></tr
><tr
id=sl_svn3_646

><td class="source">        case self::GROUP_START:<br></td></tr
><tr
id=sl_svn3_647

><td class="source">        case self::GROUP_END:<br></td></tr
><tr
id=sl_svn3_648

><td class="source">          $Type = func_get_arg(1);<br></td></tr
><tr
id=sl_svn3_649

><td class="source">          break;<br></td></tr
><tr
id=sl_svn3_650

><td class="source">        default:<br></td></tr
><tr
id=sl_svn3_651

><td class="source">          $Label = func_get_arg(1);<br></td></tr
><tr
id=sl_svn3_652

><td class="source">          break;<br></td></tr
><tr
id=sl_svn3_653

><td class="source">      }<br></td></tr
><tr
id=sl_svn3_654

><td class="source">    } else<br></td></tr
><tr
id=sl_svn3_655

><td class="source">    if(func_num_args()==3) {<br></td></tr
><tr
id=sl_svn3_656

><td class="source">      $Type = func_get_arg(2);<br></td></tr
><tr
id=sl_svn3_657

><td class="source">      $Label = func_get_arg(1);<br></td></tr
><tr
id=sl_svn3_658

><td class="source">    } else<br></td></tr
><tr
id=sl_svn3_659

><td class="source">    if(func_num_args()==4) {<br></td></tr
><tr
id=sl_svn3_660

><td class="source">      $Type = func_get_arg(2);<br></td></tr
><tr
id=sl_svn3_661

><td class="source">      $Label = func_get_arg(1);<br></td></tr
><tr
id=sl_svn3_662

><td class="source">      $Options = func_get_arg(3);<br></td></tr
><tr
id=sl_svn3_663

><td class="source">    } else {<br></td></tr
><tr
id=sl_svn3_664

><td class="source">      throw $this-&gt;newException(&#39;Wrong number of arguments to fb() function!&#39;);<br></td></tr
><tr
id=sl_svn3_665

><td class="source">    }<br></td></tr
><tr
id=sl_svn3_666

><td class="source">  <br></td></tr
><tr
id=sl_svn3_667

><td class="source">  <br></td></tr
><tr
id=sl_svn3_668

><td class="source">    if(!$this-&gt;detectClientExtension()) {<br></td></tr
><tr
id=sl_svn3_669

><td class="source">      return false;<br></td></tr
><tr
id=sl_svn3_670

><td class="source">    }<br></td></tr
><tr
id=sl_svn3_671

><td class="source">  <br></td></tr
><tr
id=sl_svn3_672

><td class="source">    $meta = array();<br></td></tr
><tr
id=sl_svn3_673

><td class="source">    $skipFinalObjectEncode = false;<br></td></tr
><tr
id=sl_svn3_674

><td class="source">  <br></td></tr
><tr
id=sl_svn3_675

><td class="source">    if($Object instanceof Exception) {<br></td></tr
><tr
id=sl_svn3_676

><td class="source"><br></td></tr
><tr
id=sl_svn3_677

><td class="source">      $meta[&#39;file&#39;] = $this-&gt;_escapeTraceFile($Object-&gt;getFile());<br></td></tr
><tr
id=sl_svn3_678

><td class="source">      $meta[&#39;line&#39;] = $Object-&gt;getLine();<br></td></tr
><tr
id=sl_svn3_679

><td class="source">      <br></td></tr
><tr
id=sl_svn3_680

><td class="source">      $trace = $Object-&gt;getTrace();<br></td></tr
><tr
id=sl_svn3_681

><td class="source">      if($Object instanceof ErrorException<br></td></tr
><tr
id=sl_svn3_682

><td class="source">         &amp;&amp; isset($trace[0][&#39;function&#39;])<br></td></tr
><tr
id=sl_svn3_683

><td class="source">         &amp;&amp; $trace[0][&#39;function&#39;]==&#39;errorHandler&#39;<br></td></tr
><tr
id=sl_svn3_684

><td class="source">         &amp;&amp; isset($trace[0][&#39;class&#39;])<br></td></tr
><tr
id=sl_svn3_685

><td class="source">         &amp;&amp; $trace[0][&#39;class&#39;]==&#39;FirePHP&#39;) {<br></td></tr
><tr
id=sl_svn3_686

><td class="source">           <br></td></tr
><tr
id=sl_svn3_687

><td class="source">        $severity = false;<br></td></tr
><tr
id=sl_svn3_688

><td class="source">        switch($Object-&gt;getSeverity()) {<br></td></tr
><tr
id=sl_svn3_689

><td class="source">          case E_WARNING: $severity = &#39;E_WARNING&#39;; break;<br></td></tr
><tr
id=sl_svn3_690

><td class="source">          case E_NOTICE: $severity = &#39;E_NOTICE&#39;; break;<br></td></tr
><tr
id=sl_svn3_691

><td class="source">          case E_USER_ERROR: $severity = &#39;E_USER_ERROR&#39;; break;<br></td></tr
><tr
id=sl_svn3_692

><td class="source">          case E_USER_WARNING: $severity = &#39;E_USER_WARNING&#39;; break;<br></td></tr
><tr
id=sl_svn3_693

><td class="source">          case E_USER_NOTICE: $severity = &#39;E_USER_NOTICE&#39;; break;<br></td></tr
><tr
id=sl_svn3_694

><td class="source">          case E_STRICT: $severity = &#39;E_STRICT&#39;; break;<br></td></tr
><tr
id=sl_svn3_695

><td class="source">          case E_RECOVERABLE_ERROR: $severity = &#39;E_RECOVERABLE_ERROR&#39;; break;<br></td></tr
><tr
id=sl_svn3_696

><td class="source">          case E_DEPRECATED: $severity = &#39;E_DEPRECATED&#39;; break;<br></td></tr
><tr
id=sl_svn3_697

><td class="source">          case E_USER_DEPRECATED: $severity = &#39;E_USER_DEPRECATED&#39;; break;<br></td></tr
><tr
id=sl_svn3_698

><td class="source">        }<br></td></tr
><tr
id=sl_svn3_699

><td class="source">           <br></td></tr
><tr
id=sl_svn3_700

><td class="source">        $Object = array(&#39;Class&#39;=&gt;get_class($Object),<br></td></tr
><tr
id=sl_svn3_701

><td class="source">                        &#39;Message&#39;=&gt;$severity.&#39;: &#39;.$Object-&gt;getMessage(),<br></td></tr
><tr
id=sl_svn3_702

><td class="source">                        &#39;File&#39;=&gt;$this-&gt;_escapeTraceFile($Object-&gt;getFile()),<br></td></tr
><tr
id=sl_svn3_703

><td class="source">                        &#39;Line&#39;=&gt;$Object-&gt;getLine(),<br></td></tr
><tr
id=sl_svn3_704

><td class="source">                        &#39;Type&#39;=&gt;&#39;trigger&#39;,<br></td></tr
><tr
id=sl_svn3_705

><td class="source">                        &#39;Trace&#39;=&gt;$this-&gt;_escapeTrace(array_splice($trace,2)));<br></td></tr
><tr
id=sl_svn3_706

><td class="source">        $skipFinalObjectEncode = true;<br></td></tr
><tr
id=sl_svn3_707

><td class="source">      } else {<br></td></tr
><tr
id=sl_svn3_708

><td class="source">        $Object = array(&#39;Class&#39;=&gt;get_class($Object),<br></td></tr
><tr
id=sl_svn3_709

><td class="source">                        &#39;Message&#39;=&gt;$Object-&gt;getMessage(),<br></td></tr
><tr
id=sl_svn3_710

><td class="source">                        &#39;File&#39;=&gt;$this-&gt;_escapeTraceFile($Object-&gt;getFile()),<br></td></tr
><tr
id=sl_svn3_711

><td class="source">                        &#39;Line&#39;=&gt;$Object-&gt;getLine(),<br></td></tr
><tr
id=sl_svn3_712

><td class="source">                        &#39;Type&#39;=&gt;&#39;throw&#39;,<br></td></tr
><tr
id=sl_svn3_713

><td class="source">                        &#39;Trace&#39;=&gt;$this-&gt;_escapeTrace($trace));<br></td></tr
><tr
id=sl_svn3_714

><td class="source">        $skipFinalObjectEncode = true;<br></td></tr
><tr
id=sl_svn3_715

><td class="source">      }<br></td></tr
><tr
id=sl_svn3_716

><td class="source">      $Type = self::EXCEPTION;<br></td></tr
><tr
id=sl_svn3_717

><td class="source">      <br></td></tr
><tr
id=sl_svn3_718

><td class="source">    } else<br></td></tr
><tr
id=sl_svn3_719

><td class="source">    if($Type==self::TRACE) {<br></td></tr
><tr
id=sl_svn3_720

><td class="source">      <br></td></tr
><tr
id=sl_svn3_721

><td class="source">      $trace = debug_backtrace();<br></td></tr
><tr
id=sl_svn3_722

><td class="source">      if(!$trace) return false;<br></td></tr
><tr
id=sl_svn3_723

><td class="source">      for( $i=0 ; $i&lt;sizeof($trace) ; $i++ ) {<br></td></tr
><tr
id=sl_svn3_724

><td class="source"><br></td></tr
><tr
id=sl_svn3_725

><td class="source">        if(isset($trace[$i][&#39;class&#39;])<br></td></tr
><tr
id=sl_svn3_726

><td class="source">           &amp;&amp; isset($trace[$i][&#39;file&#39;])<br></td></tr
><tr
id=sl_svn3_727

><td class="source">           &amp;&amp; ($trace[$i][&#39;class&#39;]==&#39;FirePHP&#39;<br></td></tr
><tr
id=sl_svn3_728

><td class="source">               || $trace[$i][&#39;class&#39;]==&#39;FB&#39;)<br></td></tr
><tr
id=sl_svn3_729

><td class="source">           &amp;&amp; (substr($this-&gt;_standardizePath($trace[$i][&#39;file&#39;]),-18,18)==&#39;FirePHPCore/fb.php&#39;<br></td></tr
><tr
id=sl_svn3_730

><td class="source">               || substr($this-&gt;_standardizePath($trace[$i][&#39;file&#39;]),-29,29)==&#39;FirePHPCore/FirePHP.class.php&#39;)) {<br></td></tr
><tr
id=sl_svn3_731

><td class="source">          /* Skip - FB::trace(), FB::send(), $firephp-&gt;trace(), $firephp-&gt;fb() */<br></td></tr
><tr
id=sl_svn3_732

><td class="source">        } else<br></td></tr
><tr
id=sl_svn3_733

><td class="source">        if(isset($trace[$i][&#39;class&#39;])<br></td></tr
><tr
id=sl_svn3_734

><td class="source">           &amp;&amp; isset($trace[$i+1][&#39;file&#39;])<br></td></tr
><tr
id=sl_svn3_735

><td class="source">           &amp;&amp; $trace[$i][&#39;class&#39;]==&#39;FirePHP&#39;<br></td></tr
><tr
id=sl_svn3_736

><td class="source">           &amp;&amp; substr($this-&gt;_standardizePath($trace[$i+1][&#39;file&#39;]),-18,18)==&#39;FirePHPCore/fb.php&#39;) {<br></td></tr
><tr
id=sl_svn3_737

><td class="source">          /* Skip fb() */<br></td></tr
><tr
id=sl_svn3_738

><td class="source">        } else<br></td></tr
><tr
id=sl_svn3_739

><td class="source">        if($trace[$i][&#39;function&#39;]==&#39;fb&#39;<br></td></tr
><tr
id=sl_svn3_740

><td class="source">           || $trace[$i][&#39;function&#39;]==&#39;trace&#39;<br></td></tr
><tr
id=sl_svn3_741

><td class="source">           || $trace[$i][&#39;function&#39;]==&#39;send&#39;) {<br></td></tr
><tr
id=sl_svn3_742

><td class="source">          $Object = array(&#39;Class&#39;=&gt;isset($trace[$i][&#39;class&#39;])?$trace[$i][&#39;class&#39;]:&#39;&#39;,<br></td></tr
><tr
id=sl_svn3_743

><td class="source">                          &#39;Type&#39;=&gt;isset($trace[$i][&#39;type&#39;])?$trace[$i][&#39;type&#39;]:&#39;&#39;,<br></td></tr
><tr
id=sl_svn3_744

><td class="source">                          &#39;Function&#39;=&gt;isset($trace[$i][&#39;function&#39;])?$trace[$i][&#39;function&#39;]:&#39;&#39;,<br></td></tr
><tr
id=sl_svn3_745

><td class="source">                          &#39;Message&#39;=&gt;$trace[$i][&#39;args&#39;][0],<br></td></tr
><tr
id=sl_svn3_746

><td class="source">                          &#39;File&#39;=&gt;isset($trace[$i][&#39;file&#39;])?$this-&gt;_escapeTraceFile($trace[$i][&#39;file&#39;]):&#39;&#39;,<br></td></tr
><tr
id=sl_svn3_747

><td class="source">                          &#39;Line&#39;=&gt;isset($trace[$i][&#39;line&#39;])?$trace[$i][&#39;line&#39;]:&#39;&#39;,<br></td></tr
><tr
id=sl_svn3_748

><td class="source">                          &#39;Args&#39;=&gt;isset($trace[$i][&#39;args&#39;])?$this-&gt;encodeObject($trace[$i][&#39;args&#39;]):&#39;&#39;,<br></td></tr
><tr
id=sl_svn3_749

><td class="source">                          &#39;Trace&#39;=&gt;$this-&gt;_escapeTrace(array_splice($trace,$i+1)));<br></td></tr
><tr
id=sl_svn3_750

><td class="source"><br></td></tr
><tr
id=sl_svn3_751

><td class="source">          $skipFinalObjectEncode = true;<br></td></tr
><tr
id=sl_svn3_752

><td class="source">          //$meta[&#39;file&#39;] = isset($trace[$i][&#39;file&#39;])?$this-&gt;_escapeTraceFile($trace[$i][&#39;file&#39;]):&#39;&#39;;<br></td></tr
><tr
id=sl_svn3_753

><td class="source">		  $meta[&#39;file&#39;] = isset($trace[$i+$this-&gt;options[&#39;LineNumbersSkipNested&#39;]][&#39;file&#39;])?$this-&gt;_escapeTraceFile($trace[$i+$this-&gt;options[&#39;LineNumbersSkipNested&#39;]][&#39;file&#39;]):&#39;&#39;;<br></td></tr
><tr
id=sl_svn3_754

><td class="source">          //$meta[&#39;line&#39;] = isset($trace[$i][&#39;line&#39;])?$trace[$i][&#39;line&#39;]:&#39;&#39;;<br></td></tr
><tr
id=sl_svn3_755

><td class="source">		  $meta[&#39;line&#39;] = isset($trace[$i+$this-&gt;options[&#39;LineNumbersSkipNested&#39;]][&#39;line&#39;])?$trace[$i+$this-&gt;options[&#39;LineNumbersSkipNested&#39;]][&#39;line&#39;]:&#39;&#39;;<br></td></tr
><tr
id=sl_svn3_756

><td class="source">          break;<br></td></tr
><tr
id=sl_svn3_757

><td class="source">        }<br></td></tr
><tr
id=sl_svn3_758

><td class="source">      }<br></td></tr
><tr
id=sl_svn3_759

><td class="source"><br></td></tr
><tr
id=sl_svn3_760

><td class="source">    } else<br></td></tr
><tr
id=sl_svn3_761

><td class="source">    if($Type==self::TABLE) {<br></td></tr
><tr
id=sl_svn3_762

><td class="source">      <br></td></tr
><tr
id=sl_svn3_763

><td class="source">      if(isset($Object[0]) &amp;&amp; is_string($Object[0])) {<br></td></tr
><tr
id=sl_svn3_764

><td class="source">        $Object[1] = $this-&gt;encodeTable($Object[1]);<br></td></tr
><tr
id=sl_svn3_765

><td class="source">      } else {<br></td></tr
><tr
id=sl_svn3_766

><td class="source">        $Object = $this-&gt;encodeTable($Object);<br></td></tr
><tr
id=sl_svn3_767

><td class="source">      }<br></td></tr
><tr
id=sl_svn3_768

><td class="source"><br></td></tr
><tr
id=sl_svn3_769

><td class="source">      $skipFinalObjectEncode = true;<br></td></tr
><tr
id=sl_svn3_770

><td class="source">      <br></td></tr
><tr
id=sl_svn3_771

><td class="source">    } else<br></td></tr
><tr
id=sl_svn3_772

><td class="source">    if($Type==self::GROUP_START) {<br></td></tr
><tr
id=sl_svn3_773

><td class="source">      <br></td></tr
><tr
id=sl_svn3_774

><td class="source">      if(!$Label) {<br></td></tr
><tr
id=sl_svn3_775

><td class="source">        throw $this-&gt;newException(&#39;You must specify a label for the group!&#39;);<br></td></tr
><tr
id=sl_svn3_776

><td class="source">      }<br></td></tr
><tr
id=sl_svn3_777

><td class="source">      <br></td></tr
><tr
id=sl_svn3_778

><td class="source">    } else {<br></td></tr
><tr
id=sl_svn3_779

><td class="source">      if($Type===null) {<br></td></tr
><tr
id=sl_svn3_780

><td class="source">        $Type = self::LOG;<br></td></tr
><tr
id=sl_svn3_781

><td class="source">      }<br></td></tr
><tr
id=sl_svn3_782

><td class="source">    }<br></td></tr
><tr
id=sl_svn3_783

><td class="source">    <br></td></tr
><tr
id=sl_svn3_784

><td class="source">    if($this-&gt;options[&#39;includeLineNumbers&#39;]) {<br></td></tr
><tr
id=sl_svn3_785

><td class="source">      if(!isset($meta[&#39;file&#39;]) || !isset($meta[&#39;line&#39;])) {<br></td></tr
><tr
id=sl_svn3_786

><td class="source"><br></td></tr
><tr
id=sl_svn3_787

><td class="source">        $trace = debug_backtrace();<br></td></tr
><tr
id=sl_svn3_788

><td class="source">        for( $i=0 ; $trace &amp;&amp; $i&lt;sizeof($trace) ; $i++ ) {<br></td></tr
><tr
id=sl_svn3_789

><td class="source">  <br></td></tr
><tr
id=sl_svn3_790

><td class="source">          if(isset($trace[$i][&#39;class&#39;])<br></td></tr
><tr
id=sl_svn3_791

><td class="source">             &amp;&amp; isset($trace[$i][&#39;file&#39;])<br></td></tr
><tr
id=sl_svn3_792

><td class="source">             &amp;&amp; ($trace[$i][&#39;class&#39;]==&#39;FirePHP&#39;<br></td></tr
><tr
id=sl_svn3_793

><td class="source">                 || $trace[$i][&#39;class&#39;]==&#39;FB&#39;)<br></td></tr
><tr
id=sl_svn3_794

><td class="source">             &amp;&amp; (substr($this-&gt;_standardizePath($trace[$i][&#39;file&#39;]),-18,18)==&#39;FirePHPCore/fb.php&#39;<br></td></tr
><tr
id=sl_svn3_795

><td class="source">                 || substr($this-&gt;_standardizePath($trace[$i][&#39;file&#39;]),-29,29)==&#39;FirePHPCore/FirePHP.class.php&#39;)) {<br></td></tr
><tr
id=sl_svn3_796

><td class="source">            /* Skip - FB::trace(), FB::send(), $firephp-&gt;trace(), $firephp-&gt;fb() */<br></td></tr
><tr
id=sl_svn3_797

><td class="source">          } else<br></td></tr
><tr
id=sl_svn3_798

><td class="source">          if(isset($trace[$i][&#39;class&#39;])<br></td></tr
><tr
id=sl_svn3_799

><td class="source">             &amp;&amp; isset($trace[$i+1][&#39;file&#39;])<br></td></tr
><tr
id=sl_svn3_800

><td class="source">             &amp;&amp; $trace[$i][&#39;class&#39;]==&#39;FirePHP&#39;<br></td></tr
><tr
id=sl_svn3_801

><td class="source">             &amp;&amp; substr($this-&gt;_standardizePath($trace[$i+1][&#39;file&#39;]),-18,18)==&#39;FirePHPCore/fb.php&#39;) {<br></td></tr
><tr
id=sl_svn3_802

><td class="source">            /* Skip fb() */<br></td></tr
><tr
id=sl_svn3_803

><td class="source">          } else<br></td></tr
><tr
id=sl_svn3_804

><td class="source">          if(isset($trace[$i][&#39;file&#39;])<br></td></tr
><tr
id=sl_svn3_805

><td class="source">             &amp;&amp; substr($this-&gt;_standardizePath($trace[$i][&#39;file&#39;]),-18,18)==&#39;FirePHPCore/fb.php&#39;) {<br></td></tr
><tr
id=sl_svn3_806

><td class="source">            /* Skip FB::fb() */<br></td></tr
><tr
id=sl_svn3_807

><td class="source">          } else {<br></td></tr
><tr
id=sl_svn3_808

><td class="source">            //$meta[&#39;file&#39;] = isset($trace[$i][&#39;file&#39;])?$this-&gt;_escapeTraceFile($trace[$i][&#39;file&#39;]):&#39;&#39;;<br></td></tr
><tr
id=sl_svn3_809

><td class="source">			$meta[&#39;file&#39;] = isset($trace[$i+$this-&gt;options[&#39;LineNumbersSkipNested&#39;]][&#39;file&#39;])?$this-&gt;_escapeTraceFile($trace[$i+$this-&gt;options[&#39;LineNumbersSkipNested&#39;]][&#39;file&#39;]):&#39;&#39;;<br></td></tr
><tr
id=sl_svn3_810

><td class="source">            //$meta[&#39;line&#39;] = isset($trace[$i][&#39;line&#39;])?$trace[$i][&#39;line&#39;]:&#39;&#39;;<br></td></tr
><tr
id=sl_svn3_811

><td class="source">			$meta[&#39;line&#39;] = isset($trace[$i+$this-&gt;options[&#39;LineNumbersSkipNested&#39;]][&#39;line&#39;])?$trace[$i+$this-&gt;options[&#39;LineNumbersSkipNested&#39;]][&#39;line&#39;]:&#39;&#39;;<br></td></tr
><tr
id=sl_svn3_812

><td class="source">            break;<br></td></tr
><tr
id=sl_svn3_813

><td class="source">          }<br></td></tr
><tr
id=sl_svn3_814

><td class="source">        }      <br></td></tr
><tr
id=sl_svn3_815

><td class="source">      <br></td></tr
><tr
id=sl_svn3_816

><td class="source">      }<br></td></tr
><tr
id=sl_svn3_817

><td class="source">    } else {<br></td></tr
><tr
id=sl_svn3_818

><td class="source">      unset($meta[&#39;file&#39;]);<br></td></tr
><tr
id=sl_svn3_819

><td class="source">      unset($meta[&#39;line&#39;]);<br></td></tr
><tr
id=sl_svn3_820

><td class="source">    }<br></td></tr
><tr
id=sl_svn3_821

><td class="source"><br></td></tr
><tr
id=sl_svn3_822

><td class="source">  	$this-&gt;setHeader(&#39;X-Wf-Protocol-1&#39;,&#39;http://meta.wildfirehq.org/Protocol/JsonStream/0.2&#39;);<br></td></tr
><tr
id=sl_svn3_823

><td class="source">  	$this-&gt;setHeader(&#39;X-Wf-1-Plugin-1&#39;,&#39;http://meta.firephp.org/Wildfire/Plugin/FirePHP/Library-FirePHPCore/&#39;.self::VERSION);<br></td></tr
><tr
id=sl_svn3_824

><td class="source"> <br></td></tr
><tr
id=sl_svn3_825

><td class="source">    $structure_index = 1;<br></td></tr
><tr
id=sl_svn3_826

><td class="source">    if($Type==self::DUMP) {<br></td></tr
><tr
id=sl_svn3_827

><td class="source">      $structure_index = 2;<br></td></tr
><tr
id=sl_svn3_828

><td class="source">    	$this-&gt;setHeader(&#39;X-Wf-1-Structure-2&#39;,&#39;http://meta.firephp.org/Wildfire/Structure/FirePHP/Dump/0.1&#39;);<br></td></tr
><tr
id=sl_svn3_829

><td class="source">    } else {<br></td></tr
><tr
id=sl_svn3_830

><td class="source">    	$this-&gt;setHeader(&#39;X-Wf-1-Structure-1&#39;,&#39;http://meta.firephp.org/Wildfire/Structure/FirePHP/FirebugConsole/0.1&#39;);<br></td></tr
><tr
id=sl_svn3_831

><td class="source">    }<br></td></tr
><tr
id=sl_svn3_832

><td class="source">  <br></td></tr
><tr
id=sl_svn3_833

><td class="source">    if($Type==self::DUMP) {<br></td></tr
><tr
id=sl_svn3_834

><td class="source">    	$msg = &#39;{&quot;&#39;.$Label.&#39;&quot;:&#39;.$this-&gt;jsonEncode($Object, $skipFinalObjectEncode).&#39;}&#39;;<br></td></tr
><tr
id=sl_svn3_835

><td class="source">    } else {<br></td></tr
><tr
id=sl_svn3_836

><td class="source">      $msg_meta = $Options;<br></td></tr
><tr
id=sl_svn3_837

><td class="source">      $msg_meta[&#39;Type&#39;] = $Type;<br></td></tr
><tr
id=sl_svn3_838

><td class="source">      if($Label!==null) {<br></td></tr
><tr
id=sl_svn3_839

><td class="source">        $msg_meta[&#39;Label&#39;] = $Label;<br></td></tr
><tr
id=sl_svn3_840

><td class="source">      }<br></td></tr
><tr
id=sl_svn3_841

><td class="source">      if(isset($meta[&#39;file&#39;]) &amp;&amp; !isset($msg_meta[&#39;File&#39;])) {<br></td></tr
><tr
id=sl_svn3_842

><td class="source">        $msg_meta[&#39;File&#39;] = $meta[&#39;file&#39;];<br></td></tr
><tr
id=sl_svn3_843

><td class="source">      }<br></td></tr
><tr
id=sl_svn3_844

><td class="source">      if(isset($meta[&#39;line&#39;]) &amp;&amp; !isset($msg_meta[&#39;Line&#39;])) {<br></td></tr
><tr
id=sl_svn3_845

><td class="source">        $msg_meta[&#39;Line&#39;] = $meta[&#39;line&#39;];<br></td></tr
><tr
id=sl_svn3_846

><td class="source">      }<br></td></tr
><tr
id=sl_svn3_847

><td class="source">    	$msg = &#39;[&#39;.$this-&gt;jsonEncode($msg_meta).&#39;,&#39;.$this-&gt;jsonEncode($Object, $skipFinalObjectEncode).&#39;]&#39;;<br></td></tr
><tr
id=sl_svn3_848

><td class="source">    }<br></td></tr
><tr
id=sl_svn3_849

><td class="source">    <br></td></tr
><tr
id=sl_svn3_850

><td class="source">    $parts = explode(&quot;\n&quot;,chunk_split($msg, 5000, &quot;\n&quot;));<br></td></tr
><tr
id=sl_svn3_851

><td class="source"><br></td></tr
><tr
id=sl_svn3_852

><td class="source">    for( $i=0 ; $i&lt;count($parts) ; $i++) {<br></td></tr
><tr
id=sl_svn3_853

><td class="source">        <br></td></tr
><tr
id=sl_svn3_854

><td class="source">        $part = $parts[$i];<br></td></tr
><tr
id=sl_svn3_855

><td class="source">        if ($part) {<br></td></tr
><tr
id=sl_svn3_856

><td class="source">            <br></td></tr
><tr
id=sl_svn3_857

><td class="source">            if(count($parts)&gt;2) {<br></td></tr
><tr
id=sl_svn3_858

><td class="source">              // Message needs to be split into multiple parts<br></td></tr
><tr
id=sl_svn3_859

><td class="source">              $this-&gt;setHeader(&#39;X-Wf-1-&#39;.$structure_index.&#39;-&#39;.&#39;1-&#39;.$this-&gt;messageIndex,<br></td></tr
><tr
id=sl_svn3_860

><td class="source">                               (($i==0)?strlen($msg):&#39;&#39;)<br></td></tr
><tr
id=sl_svn3_861

><td class="source">                               . &#39;|&#39; . $part . &#39;|&#39;<br></td></tr
><tr
id=sl_svn3_862

><td class="source">                               . (($i&lt;count($parts)-2)?&#39;\\&#39;:&#39;&#39;));<br></td></tr
><tr
id=sl_svn3_863

><td class="source">            } else {<br></td></tr
><tr
id=sl_svn3_864

><td class="source">              $this-&gt;setHeader(&#39;X-Wf-1-&#39;.$structure_index.&#39;-&#39;.&#39;1-&#39;.$this-&gt;messageIndex,<br></td></tr
><tr
id=sl_svn3_865

><td class="source">                               strlen($part) . &#39;|&#39; . $part . &#39;|&#39;);<br></td></tr
><tr
id=sl_svn3_866

><td class="source">            }<br></td></tr
><tr
id=sl_svn3_867

><td class="source">            <br></td></tr
><tr
id=sl_svn3_868

><td class="source">            $this-&gt;messageIndex++;<br></td></tr
><tr
id=sl_svn3_869

><td class="source">            <br></td></tr
><tr
id=sl_svn3_870

><td class="source">            if ($this-&gt;messageIndex &gt; 99999) {<br></td></tr
><tr
id=sl_svn3_871

><td class="source">                throw $this-&gt;newException(&#39;Maximum number (99,999) of messages reached!&#39;);             <br></td></tr
><tr
id=sl_svn3_872

><td class="source">            }<br></td></tr
><tr
id=sl_svn3_873

><td class="source">        }<br></td></tr
><tr
id=sl_svn3_874

><td class="source">    }<br></td></tr
><tr
id=sl_svn3_875

><td class="source"><br></td></tr
><tr
id=sl_svn3_876

><td class="source">  	$this-&gt;setHeader(&#39;X-Wf-1-Index&#39;,$this-&gt;messageIndex-1);<br></td></tr
><tr
id=sl_svn3_877

><td class="source"><br></td></tr
><tr
id=sl_svn3_878

><td class="source">    return true;<br></td></tr
><tr
id=sl_svn3_879

><td class="source">  }<br></td></tr
><tr
id=sl_svn3_880

><td class="source">  <br></td></tr
><tr
id=sl_svn3_881

><td class="source">  /**<br></td></tr
><tr
id=sl_svn3_882

><td class="source">   * Standardizes path for windows systems.<br></td></tr
><tr
id=sl_svn3_883

><td class="source">   *<br></td></tr
><tr
id=sl_svn3_884

><td class="source">   * @param string $Path<br></td></tr
><tr
id=sl_svn3_885

><td class="source">   * @return string<br></td></tr
><tr
id=sl_svn3_886

><td class="source">   */<br></td></tr
><tr
id=sl_svn3_887

><td class="source">  protected function _standardizePath($Path) {<br></td></tr
><tr
id=sl_svn3_888

><td class="source">    return preg_replace(&#39;/\\\\+/&#39;,&#39;/&#39;,$Path);    <br></td></tr
><tr
id=sl_svn3_889

><td class="source">  }<br></td></tr
><tr
id=sl_svn3_890

><td class="source">  <br></td></tr
><tr
id=sl_svn3_891

><td class="source">  /**<br></td></tr
><tr
id=sl_svn3_892

><td class="source">   * Escape trace path for windows systems<br></td></tr
><tr
id=sl_svn3_893

><td class="source">   *<br></td></tr
><tr
id=sl_svn3_894

><td class="source">   * @param array $Trace<br></td></tr
><tr
id=sl_svn3_895

><td class="source">   * @return array<br></td></tr
><tr
id=sl_svn3_896

><td class="source">   */<br></td></tr
><tr
id=sl_svn3_897

><td class="source">  protected function _escapeTrace($Trace) {<br></td></tr
><tr
id=sl_svn3_898

><td class="source">    if(!$Trace) return $Trace;<br></td></tr
><tr
id=sl_svn3_899

><td class="source">    for( $i=0 ; $i&lt;sizeof($Trace) ; $i++ ) {<br></td></tr
><tr
id=sl_svn3_900

><td class="source">      if(isset($Trace[$i][&#39;file&#39;])) {<br></td></tr
><tr
id=sl_svn3_901

><td class="source">        $Trace[$i][&#39;file&#39;] = $this-&gt;_escapeTraceFile($Trace[$i][&#39;file&#39;]);<br></td></tr
><tr
id=sl_svn3_902

><td class="source">      }<br></td></tr
><tr
id=sl_svn3_903

><td class="source">      if(isset($Trace[$i][&#39;args&#39;])) {<br></td></tr
><tr
id=sl_svn3_904

><td class="source">        $Trace[$i][&#39;args&#39;] = $this-&gt;encodeObject($Trace[$i][&#39;args&#39;]);<br></td></tr
><tr
id=sl_svn3_905

><td class="source">      }<br></td></tr
><tr
id=sl_svn3_906

><td class="source">    }<br></td></tr
><tr
id=sl_svn3_907

><td class="source">    return $Trace;    <br></td></tr
><tr
id=sl_svn3_908

><td class="source">  }<br></td></tr
><tr
id=sl_svn3_909

><td class="source">  <br></td></tr
><tr
id=sl_svn3_910

><td class="source">  /**<br></td></tr
><tr
id=sl_svn3_911

><td class="source">   * Escape file information of trace for windows systems<br></td></tr
><tr
id=sl_svn3_912

><td class="source">   *<br></td></tr
><tr
id=sl_svn3_913

><td class="source">   * @param string $File<br></td></tr
><tr
id=sl_svn3_914

><td class="source">   * @return string<br></td></tr
><tr
id=sl_svn3_915

><td class="source">   */<br></td></tr
><tr
id=sl_svn3_916

><td class="source">  protected function _escapeTraceFile($File) {<br></td></tr
><tr
id=sl_svn3_917

><td class="source">    /* Check if we have a windows filepath */<br></td></tr
><tr
id=sl_svn3_918

><td class="source">    if(strpos($File,&#39;\\&#39;)) {<br></td></tr
><tr
id=sl_svn3_919

><td class="source">      /* First strip down to single \ */<br></td></tr
><tr
id=sl_svn3_920

><td class="source">      <br></td></tr
><tr
id=sl_svn3_921

><td class="source">      $file = preg_replace(&#39;/\\\\+/&#39;,&#39;\\&#39;,$File);<br></td></tr
><tr
id=sl_svn3_922

><td class="source">      <br></td></tr
><tr
id=sl_svn3_923

><td class="source">      return $file;<br></td></tr
><tr
id=sl_svn3_924

><td class="source">    }<br></td></tr
><tr
id=sl_svn3_925

><td class="source">    return $File;<br></td></tr
><tr
id=sl_svn3_926

><td class="source">  }<br></td></tr
><tr
id=sl_svn3_927

><td class="source"><br></td></tr
><tr
id=sl_svn3_928

><td class="source">  /**<br></td></tr
><tr
id=sl_svn3_929

><td class="source">   * Send header<br></td></tr
><tr
id=sl_svn3_930

><td class="source">   *<br></td></tr
><tr
id=sl_svn3_931

><td class="source">   * @param string $Name<br></td></tr
><tr
id=sl_svn3_932

><td class="source">   * @param string_type $Value<br></td></tr
><tr
id=sl_svn3_933

><td class="source">   */<br></td></tr
><tr
id=sl_svn3_934

><td class="source">  protected function setHeader($Name, $Value) {<br></td></tr
><tr
id=sl_svn3_935

><td class="source">    return header($Name.&#39;: &#39;.$Value);<br></td></tr
><tr
id=sl_svn3_936

><td class="source">  }<br></td></tr
><tr
id=sl_svn3_937

><td class="source"><br></td></tr
><tr
id=sl_svn3_938

><td class="source">  /**<br></td></tr
><tr
id=sl_svn3_939

><td class="source">   * Get user agent<br></td></tr
><tr
id=sl_svn3_940

><td class="source">   *<br></td></tr
><tr
id=sl_svn3_941

><td class="source">   * @return string|false<br></td></tr
><tr
id=sl_svn3_942

><td class="source">   */<br></td></tr
><tr
id=sl_svn3_943

><td class="source">  protected function getUserAgent() {<br></td></tr
><tr
id=sl_svn3_944

><td class="source">    if(!isset($_SERVER[&#39;HTTP_USER_AGENT&#39;])) return false;<br></td></tr
><tr
id=sl_svn3_945

><td class="source">    return $_SERVER[&#39;HTTP_USER_AGENT&#39;];<br></td></tr
><tr
id=sl_svn3_946

><td class="source">  }<br></td></tr
><tr
id=sl_svn3_947

><td class="source"><br></td></tr
><tr
id=sl_svn3_948

><td class="source">  /**<br></td></tr
><tr
id=sl_svn3_949

><td class="source">   * Returns a new exception<br></td></tr
><tr
id=sl_svn3_950

><td class="source">   *<br></td></tr
><tr
id=sl_svn3_951

><td class="source">   * @param string $Message<br></td></tr
><tr
id=sl_svn3_952

><td class="source">   * @return Exception<br></td></tr
><tr
id=sl_svn3_953

><td class="source">   */<br></td></tr
><tr
id=sl_svn3_954

><td class="source">  protected function newException($Message) {<br></td></tr
><tr
id=sl_svn3_955

><td class="source">    return new Exception($Message);<br></td></tr
><tr
id=sl_svn3_956

><td class="source">  }<br></td></tr
><tr
id=sl_svn3_957

><td class="source">  <br></td></tr
><tr
id=sl_svn3_958

><td class="source">  /**<br></td></tr
><tr
id=sl_svn3_959

><td class="source">   * Encode an object into a JSON string<br></td></tr
><tr
id=sl_svn3_960

><td class="source">   * <br></td></tr
><tr
id=sl_svn3_961

><td class="source">   * Uses PHP&#39;s jeson_encode() if available<br></td></tr
><tr
id=sl_svn3_962

><td class="source">   * <br></td></tr
><tr
id=sl_svn3_963

><td class="source">   * @param object $Object The object to be encoded<br></td></tr
><tr
id=sl_svn3_964

><td class="source">   * @return string The JSON string<br></td></tr
><tr
id=sl_svn3_965

><td class="source">   */<br></td></tr
><tr
id=sl_svn3_966

><td class="source">  public function jsonEncode($Object, $skipObjectEncode=false)<br></td></tr
><tr
id=sl_svn3_967

><td class="source">  {<br></td></tr
><tr
id=sl_svn3_968

><td class="source">    if(!$skipObjectEncode) {<br></td></tr
><tr
id=sl_svn3_969

><td class="source">      $Object = $this-&gt;encodeObject($Object);<br></td></tr
><tr
id=sl_svn3_970

><td class="source">    }<br></td></tr
><tr
id=sl_svn3_971

><td class="source">    <br></td></tr
><tr
id=sl_svn3_972

><td class="source">    if(function_exists(&#39;json_encode&#39;)<br></td></tr
><tr
id=sl_svn3_973

><td class="source">       &amp;&amp; $this-&gt;options[&#39;useNativeJsonEncode&#39;]!=false) {<br></td></tr
><tr
id=sl_svn3_974

><td class="source"><br></td></tr
><tr
id=sl_svn3_975

><td class="source">      return json_encode($Object);<br></td></tr
><tr
id=sl_svn3_976

><td class="source">    } else {<br></td></tr
><tr
id=sl_svn3_977

><td class="source">      return $this-&gt;json_encode($Object);<br></td></tr
><tr
id=sl_svn3_978

><td class="source">    }<br></td></tr
><tr
id=sl_svn3_979

><td class="source">  }<br></td></tr
><tr
id=sl_svn3_980

><td class="source"><br></td></tr
><tr
id=sl_svn3_981

><td class="source">  /**<br></td></tr
><tr
id=sl_svn3_982

><td class="source">   * Encodes a table by encoding each row and column with encodeObject()<br></td></tr
><tr
id=sl_svn3_983

><td class="source">   * <br></td></tr
><tr
id=sl_svn3_984

><td class="source">   * @param array $Table The table to be encoded<br></td></tr
><tr
id=sl_svn3_985

><td class="source">   * @return array<br></td></tr
><tr
id=sl_svn3_986

><td class="source">   */  <br></td></tr
><tr
id=sl_svn3_987

><td class="source">  protected function encodeTable($Table) {<br></td></tr
><tr
id=sl_svn3_988

><td class="source">    <br></td></tr
><tr
id=sl_svn3_989

><td class="source">    if(!$Table) return $Table;<br></td></tr
><tr
id=sl_svn3_990

><td class="source">    <br></td></tr
><tr
id=sl_svn3_991

><td class="source">    $new_table = array();<br></td></tr
><tr
id=sl_svn3_992

><td class="source">    foreach($Table as $row) {<br></td></tr
><tr
id=sl_svn3_993

><td class="source">  <br></td></tr
><tr
id=sl_svn3_994

><td class="source">      if(is_array($row)) {<br></td></tr
><tr
id=sl_svn3_995

><td class="source">        $new_row = array();<br></td></tr
><tr
id=sl_svn3_996

><td class="source">        <br></td></tr
><tr
id=sl_svn3_997

><td class="source">        foreach($row as $item) {<br></td></tr
><tr
id=sl_svn3_998

><td class="source">          $new_row[] = $this-&gt;encodeObject($item);<br></td></tr
><tr
id=sl_svn3_999

><td class="source">        }<br></td></tr
><tr
id=sl_svn3_1000

><td class="source">        <br></td></tr
><tr
id=sl_svn3_1001

><td class="source">        $new_table[] = $new_row;<br></td></tr
><tr
id=sl_svn3_1002

><td class="source">      }<br></td></tr
><tr
id=sl_svn3_1003

><td class="source">    }<br></td></tr
><tr
id=sl_svn3_1004

><td class="source">    <br></td></tr
><tr
id=sl_svn3_1005

><td class="source">    return $new_table;<br></td></tr
><tr
id=sl_svn3_1006

><td class="source">  }<br></td></tr
><tr
id=sl_svn3_1007

><td class="source"><br></td></tr
><tr
id=sl_svn3_1008

><td class="source">  /**<br></td></tr
><tr
id=sl_svn3_1009

><td class="source">   * Encodes an object including members with<br></td></tr
><tr
id=sl_svn3_1010

><td class="source">   * protected and private visibility<br></td></tr
><tr
id=sl_svn3_1011

><td class="source">   * <br></td></tr
><tr
id=sl_svn3_1012

><td class="source">   * @param Object $Object The object to be encoded<br></td></tr
><tr
id=sl_svn3_1013

><td class="source">   * @param int $Depth The current traversal depth<br></td></tr
><tr
id=sl_svn3_1014

><td class="source">   * @return array All members of the object<br></td></tr
><tr
id=sl_svn3_1015

><td class="source">   */<br></td></tr
><tr
id=sl_svn3_1016

><td class="source">  protected function encodeObject($Object, $ObjectDepth = 1, $ArrayDepth = 1)<br></td></tr
><tr
id=sl_svn3_1017

><td class="source">  {<br></td></tr
><tr
id=sl_svn3_1018

><td class="source">    $return = array();<br></td></tr
><tr
id=sl_svn3_1019

><td class="source"><br></td></tr
><tr
id=sl_svn3_1020

><td class="source">    if (is_resource($Object)) {<br></td></tr
><tr
id=sl_svn3_1021

><td class="source"><br></td></tr
><tr
id=sl_svn3_1022

><td class="source">      return &#39;** &#39;.(string)$Object.&#39; **&#39;;<br></td></tr
><tr
id=sl_svn3_1023

><td class="source"><br></td></tr
><tr
id=sl_svn3_1024

><td class="source">    } else    <br></td></tr
><tr
id=sl_svn3_1025

><td class="source">    if (is_object($Object)) {<br></td></tr
><tr
id=sl_svn3_1026

><td class="source"><br></td></tr
><tr
id=sl_svn3_1027

><td class="source">        if ($ObjectDepth &gt; $this-&gt;options[&#39;maxObjectDepth&#39;]) {<br></td></tr
><tr
id=sl_svn3_1028

><td class="source">          return &#39;** Max Object Depth (&#39;.$this-&gt;options[&#39;maxObjectDepth&#39;].&#39;) **&#39;;<br></td></tr
><tr
id=sl_svn3_1029

><td class="source">        }<br></td></tr
><tr
id=sl_svn3_1030

><td class="source">        <br></td></tr
><tr
id=sl_svn3_1031

><td class="source">        foreach ($this-&gt;objectStack as $refVal) {<br></td></tr
><tr
id=sl_svn3_1032

><td class="source">            if ($refVal === $Object) {<br></td></tr
><tr
id=sl_svn3_1033

><td class="source">                return &#39;** Recursion (&#39;.get_class($Object).&#39;) **&#39;;<br></td></tr
><tr
id=sl_svn3_1034

><td class="source">            }<br></td></tr
><tr
id=sl_svn3_1035

><td class="source">        }<br></td></tr
><tr
id=sl_svn3_1036

><td class="source">        array_push($this-&gt;objectStack, $Object);<br></td></tr
><tr
id=sl_svn3_1037

><td class="source">                <br></td></tr
><tr
id=sl_svn3_1038

><td class="source">        $return[&#39;__className&#39;] = $class = get_class($Object);<br></td></tr
><tr
id=sl_svn3_1039

><td class="source">        $class_lower = strtolower($class);<br></td></tr
><tr
id=sl_svn3_1040

><td class="source"><br></td></tr
><tr
id=sl_svn3_1041

><td class="source">        $reflectionClass = new ReflectionClass($class);  <br></td></tr
><tr
id=sl_svn3_1042

><td class="source">        $properties = array();<br></td></tr
><tr
id=sl_svn3_1043

><td class="source">        foreach( $reflectionClass-&gt;getProperties() as $property) {<br></td></tr
><tr
id=sl_svn3_1044

><td class="source">          $properties[$property-&gt;getName()] = $property;<br></td></tr
><tr
id=sl_svn3_1045

><td class="source">        }<br></td></tr
><tr
id=sl_svn3_1046

><td class="source">            <br></td></tr
><tr
id=sl_svn3_1047

><td class="source">        $members = (array)$Object;<br></td></tr
><tr
id=sl_svn3_1048

><td class="source">            <br></td></tr
><tr
id=sl_svn3_1049

><td class="source">        foreach( $properties as $raw_name =&gt; $property ) {<br></td></tr
><tr
id=sl_svn3_1050

><td class="source">          <br></td></tr
><tr
id=sl_svn3_1051

><td class="source">          $name = $raw_name;<br></td></tr
><tr
id=sl_svn3_1052

><td class="source">          if($property-&gt;isStatic()) {<br></td></tr
><tr
id=sl_svn3_1053

><td class="source">            $name = &#39;static:&#39;.$name;<br></td></tr
><tr
id=sl_svn3_1054

><td class="source">          }<br></td></tr
><tr
id=sl_svn3_1055

><td class="source">          if($property-&gt;isPublic()) {<br></td></tr
><tr
id=sl_svn3_1056

><td class="source">            $name = &#39;public:&#39;.$name;<br></td></tr
><tr
id=sl_svn3_1057

><td class="source">          } else<br></td></tr
><tr
id=sl_svn3_1058

><td class="source">          if($property-&gt;isPrivate()) {<br></td></tr
><tr
id=sl_svn3_1059

><td class="source">            $name = &#39;private:&#39;.$name;<br></td></tr
><tr
id=sl_svn3_1060

><td class="source">            $raw_name = &quot;\0&quot;.$class.&quot;\0&quot;.$raw_name;<br></td></tr
><tr
id=sl_svn3_1061

><td class="source">          } else<br></td></tr
><tr
id=sl_svn3_1062

><td class="source">          if($property-&gt;isProtected()) {<br></td></tr
><tr
id=sl_svn3_1063

><td class="source">            $name = &#39;protected:&#39;.$name;<br></td></tr
><tr
id=sl_svn3_1064

><td class="source">            $raw_name = &quot;\0&quot;.&#39;*&#39;.&quot;\0&quot;.$raw_name;<br></td></tr
><tr
id=sl_svn3_1065

><td class="source">          }<br></td></tr
><tr
id=sl_svn3_1066

><td class="source">          <br></td></tr
><tr
id=sl_svn3_1067

><td class="source">          if(!(isset($this-&gt;objectFilters[$class_lower])<br></td></tr
><tr
id=sl_svn3_1068

><td class="source">               &amp;&amp; is_array($this-&gt;objectFilters[$class_lower])<br></td></tr
><tr
id=sl_svn3_1069

><td class="source">               &amp;&amp; in_array($raw_name,$this-&gt;objectFilters[$class_lower]))) {<br></td></tr
><tr
id=sl_svn3_1070

><td class="source"><br></td></tr
><tr
id=sl_svn3_1071

><td class="source">            if(array_key_exists($raw_name,$members)<br></td></tr
><tr
id=sl_svn3_1072

><td class="source">               &amp;&amp; !$property-&gt;isStatic()) {<br></td></tr
><tr
id=sl_svn3_1073

><td class="source">              <br></td></tr
><tr
id=sl_svn3_1074

><td class="source">              $return[$name] = $this-&gt;encodeObject($members[$raw_name], $ObjectDepth + 1, 1);      <br></td></tr
><tr
id=sl_svn3_1075

><td class="source">            <br></td></tr
><tr
id=sl_svn3_1076

><td class="source">            } else {<br></td></tr
><tr
id=sl_svn3_1077

><td class="source">              if(method_exists($property,&#39;setAccessible&#39;)) {<br></td></tr
><tr
id=sl_svn3_1078

><td class="source">                $property-&gt;setAccessible(true);<br></td></tr
><tr
id=sl_svn3_1079

><td class="source">                $return[$name] = $this-&gt;encodeObject($property-&gt;getValue($Object), $ObjectDepth + 1, 1);<br></td></tr
><tr
id=sl_svn3_1080

><td class="source">              } else<br></td></tr
><tr
id=sl_svn3_1081

><td class="source">              if($property-&gt;isPublic()) {<br></td></tr
><tr
id=sl_svn3_1082

><td class="source">                $return[$name] = $this-&gt;encodeObject($property-&gt;getValue($Object), $ObjectDepth + 1, 1);<br></td></tr
><tr
id=sl_svn3_1083

><td class="source">              } else {<br></td></tr
><tr
id=sl_svn3_1084

><td class="source">                $return[$name] = &#39;** Need PHP 5.3 to get value **&#39;;<br></td></tr
><tr
id=sl_svn3_1085

><td class="source">              }<br></td></tr
><tr
id=sl_svn3_1086

><td class="source">            }<br></td></tr
><tr
id=sl_svn3_1087

><td class="source">          } else {<br></td></tr
><tr
id=sl_svn3_1088

><td class="source">            $return[$name] = &#39;** Excluded by Filter **&#39;;<br></td></tr
><tr
id=sl_svn3_1089

><td class="source">          }<br></td></tr
><tr
id=sl_svn3_1090

><td class="source">        }<br></td></tr
><tr
id=sl_svn3_1091

><td class="source">        <br></td></tr
><tr
id=sl_svn3_1092

><td class="source">        // Include all members that are not defined in the class<br></td></tr
><tr
id=sl_svn3_1093

><td class="source">        // but exist in the object<br></td></tr
><tr
id=sl_svn3_1094

><td class="source">        foreach( $members as $raw_name =&gt; $value ) {<br></td></tr
><tr
id=sl_svn3_1095

><td class="source">          <br></td></tr
><tr
id=sl_svn3_1096

><td class="source">          $name = $raw_name;<br></td></tr
><tr
id=sl_svn3_1097

><td class="source">          <br></td></tr
><tr
id=sl_svn3_1098

><td class="source">          if ($name{0} == &quot;\0&quot;) {<br></td></tr
><tr
id=sl_svn3_1099

><td class="source">            $parts = explode(&quot;\0&quot;, $name);<br></td></tr
><tr
id=sl_svn3_1100

><td class="source">            $name = $parts[2];<br></td></tr
><tr
id=sl_svn3_1101

><td class="source">          }<br></td></tr
><tr
id=sl_svn3_1102

><td class="source">          <br></td></tr
><tr
id=sl_svn3_1103

><td class="source">          if(!isset($properties[$name])) {<br></td></tr
><tr
id=sl_svn3_1104

><td class="source">            $name = &#39;undeclared:&#39;.$name;<br></td></tr
><tr
id=sl_svn3_1105

><td class="source">              <br></td></tr
><tr
id=sl_svn3_1106

><td class="source">            if(!(isset($this-&gt;objectFilters[$class_lower])<br></td></tr
><tr
id=sl_svn3_1107

><td class="source">                 &amp;&amp; is_array($this-&gt;objectFilters[$class_lower])<br></td></tr
><tr
id=sl_svn3_1108

><td class="source">                 &amp;&amp; in_array($raw_name,$this-&gt;objectFilters[$class_lower]))) {<br></td></tr
><tr
id=sl_svn3_1109

><td class="source">              <br></td></tr
><tr
id=sl_svn3_1110

><td class="source">              $return[$name] = $this-&gt;encodeObject($value, $ObjectDepth + 1, 1);<br></td></tr
><tr
id=sl_svn3_1111

><td class="source">            } else {<br></td></tr
><tr
id=sl_svn3_1112

><td class="source">              $return[$name] = &#39;** Excluded by Filter **&#39;;<br></td></tr
><tr
id=sl_svn3_1113

><td class="source">            }<br></td></tr
><tr
id=sl_svn3_1114

><td class="source">          }<br></td></tr
><tr
id=sl_svn3_1115

><td class="source">        }<br></td></tr
><tr
id=sl_svn3_1116

><td class="source">        <br></td></tr
><tr
id=sl_svn3_1117

><td class="source">        array_pop($this-&gt;objectStack);<br></td></tr
><tr
id=sl_svn3_1118

><td class="source">        <br></td></tr
><tr
id=sl_svn3_1119

><td class="source">    } elseif (is_array($Object)) {<br></td></tr
><tr
id=sl_svn3_1120

><td class="source"><br></td></tr
><tr
id=sl_svn3_1121

><td class="source">        if ($ArrayDepth &gt; $this-&gt;options[&#39;maxArrayDepth&#39;]) {<br></td></tr
><tr
id=sl_svn3_1122

><td class="source">          return &#39;** Max Array Depth (&#39;.$this-&gt;options[&#39;maxArrayDepth&#39;].&#39;) **&#39;;<br></td></tr
><tr
id=sl_svn3_1123

><td class="source">        }<br></td></tr
><tr
id=sl_svn3_1124

><td class="source">      <br></td></tr
><tr
id=sl_svn3_1125

><td class="source">        foreach ($Object as $key =&gt; $val) {<br></td></tr
><tr
id=sl_svn3_1126

><td class="source">          <br></td></tr
><tr
id=sl_svn3_1127

><td class="source">          // Encoding the $GLOBALS PHP array causes an infinite loop<br></td></tr
><tr
id=sl_svn3_1128

><td class="source">          // if the recursion is not reset here as it contains<br></td></tr
><tr
id=sl_svn3_1129

><td class="source">          // a reference to itself. This is the only way I have come up<br></td></tr
><tr
id=sl_svn3_1130

><td class="source">          // with to stop infinite recursion in this case.<br></td></tr
><tr
id=sl_svn3_1131

><td class="source">          if($key==&#39;GLOBALS&#39;<br></td></tr
><tr
id=sl_svn3_1132

><td class="source">             &amp;&amp; is_array($val)<br></td></tr
><tr
id=sl_svn3_1133

><td class="source">             &amp;&amp; array_key_exists(&#39;GLOBALS&#39;,$val)) {<br></td></tr
><tr
id=sl_svn3_1134

><td class="source">            $val[&#39;GLOBALS&#39;] = &#39;** Recursion (GLOBALS) **&#39;;<br></td></tr
><tr
id=sl_svn3_1135

><td class="source">          }<br></td></tr
><tr
id=sl_svn3_1136

><td class="source">          <br></td></tr
><tr
id=sl_svn3_1137

><td class="source">          $return[$key] = $this-&gt;encodeObject($val, 1, $ArrayDepth + 1);<br></td></tr
><tr
id=sl_svn3_1138

><td class="source">        }<br></td></tr
><tr
id=sl_svn3_1139

><td class="source">    } else {<br></td></tr
><tr
id=sl_svn3_1140

><td class="source">      if(self::is_utf8($Object)) {<br></td></tr
><tr
id=sl_svn3_1141

><td class="source">        return $Object;<br></td></tr
><tr
id=sl_svn3_1142

><td class="source">      } else {<br></td></tr
><tr
id=sl_svn3_1143

><td class="source">        return utf8_encode($Object);<br></td></tr
><tr
id=sl_svn3_1144

><td class="source">      }<br></td></tr
><tr
id=sl_svn3_1145

><td class="source">    }<br></td></tr
><tr
id=sl_svn3_1146

><td class="source">    return $return;<br></td></tr
><tr
id=sl_svn3_1147

><td class="source">  }<br></td></tr
><tr
id=sl_svn3_1148

><td class="source"><br></td></tr
><tr
id=sl_svn3_1149

><td class="source">  /**<br></td></tr
><tr
id=sl_svn3_1150

><td class="source">   * Returns true if $string is valid UTF-8 and false otherwise.<br></td></tr
><tr
id=sl_svn3_1151

><td class="source">   *<br></td></tr
><tr
id=sl_svn3_1152

><td class="source">   * @param mixed $str String to be tested<br></td></tr
><tr
id=sl_svn3_1153

><td class="source">   * @return boolean<br></td></tr
><tr
id=sl_svn3_1154

><td class="source">   */<br></td></tr
><tr
id=sl_svn3_1155

><td class="source">  protected static function is_utf8($str) {<br></td></tr
><tr
id=sl_svn3_1156

><td class="source">    $c=0; $b=0;<br></td></tr
><tr
id=sl_svn3_1157

><td class="source">    $bits=0;<br></td></tr
><tr
id=sl_svn3_1158

><td class="source">    $len=strlen($str);<br></td></tr
><tr
id=sl_svn3_1159

><td class="source">    for($i=0; $i&lt;$len; $i++){<br></td></tr
><tr
id=sl_svn3_1160

><td class="source">        $c=ord($str[$i]);<br></td></tr
><tr
id=sl_svn3_1161

><td class="source">        if($c &gt; 128){<br></td></tr
><tr
id=sl_svn3_1162

><td class="source">            if(($c &gt;= 254)) return false;<br></td></tr
><tr
id=sl_svn3_1163

><td class="source">            elseif($c &gt;= 252) $bits=6;<br></td></tr
><tr
id=sl_svn3_1164

><td class="source">            elseif($c &gt;= 248) $bits=5;<br></td></tr
><tr
id=sl_svn3_1165

><td class="source">            elseif($c &gt;= 240) $bits=4;<br></td></tr
><tr
id=sl_svn3_1166

><td class="source">            elseif($c &gt;= 224) $bits=3;<br></td></tr
><tr
id=sl_svn3_1167

><td class="source">            elseif($c &gt;= 192) $bits=2;<br></td></tr
><tr
id=sl_svn3_1168

><td class="source">            else return false;<br></td></tr
><tr
id=sl_svn3_1169

><td class="source">            if(($i+$bits) &gt; $len) return false;<br></td></tr
><tr
id=sl_svn3_1170

><td class="source">            while($bits &gt; 1){<br></td></tr
><tr
id=sl_svn3_1171

><td class="source">                $i++;<br></td></tr
><tr
id=sl_svn3_1172

><td class="source">                $b=ord($str[$i]);<br></td></tr
><tr
id=sl_svn3_1173

><td class="source">                if($b &lt; 128 || $b &gt; 191) return false;<br></td></tr
><tr
id=sl_svn3_1174

><td class="source">                $bits--;<br></td></tr
><tr
id=sl_svn3_1175

><td class="source">            }<br></td></tr
><tr
id=sl_svn3_1176

><td class="source">        }<br></td></tr
><tr
id=sl_svn3_1177

><td class="source">    }<br></td></tr
><tr
id=sl_svn3_1178

><td class="source">    return true;<br></td></tr
><tr
id=sl_svn3_1179

><td class="source">  } <br></td></tr
><tr
id=sl_svn3_1180

><td class="source"><br></td></tr
><tr
id=sl_svn3_1181

><td class="source">  /**<br></td></tr
><tr
id=sl_svn3_1182

><td class="source">   * Converts to and from JSON format.<br></td></tr
><tr
id=sl_svn3_1183

><td class="source">   *<br></td></tr
><tr
id=sl_svn3_1184

><td class="source">   * JSON (JavaScript Object Notation) is a lightweight data-interchange<br></td></tr
><tr
id=sl_svn3_1185

><td class="source">   * format. It is easy for humans to read and write. It is easy for machines<br></td></tr
><tr
id=sl_svn3_1186

><td class="source">   * to parse and generate. It is based on a subset of the JavaScript<br></td></tr
><tr
id=sl_svn3_1187

><td class="source">   * Programming Language, Standard ECMA-262 3rd Edition - December 1999.<br></td></tr
><tr
id=sl_svn3_1188

><td class="source">   * This feature can also be found in  Python. JSON is a text format that is<br></td></tr
><tr
id=sl_svn3_1189

><td class="source">   * completely language independent but uses conventions that are familiar<br></td></tr
><tr
id=sl_svn3_1190

><td class="source">   * to programmers of the C-family of languages, including C, C++, C#, Java,<br></td></tr
><tr
id=sl_svn3_1191

><td class="source">   * JavaScript, Perl, TCL, and many others. These properties make JSON an<br></td></tr
><tr
id=sl_svn3_1192

><td class="source">   * ideal data-interchange language.<br></td></tr
><tr
id=sl_svn3_1193

><td class="source">   *<br></td></tr
><tr
id=sl_svn3_1194

><td class="source">   * This package provides a simple encoder and decoder for JSON notation. It<br></td></tr
><tr
id=sl_svn3_1195

><td class="source">   * is intended for use with client-side Javascript applications that make<br></td></tr
><tr
id=sl_svn3_1196

><td class="source">   * use of HTTPRequest to perform server communication functions - data can<br></td></tr
><tr
id=sl_svn3_1197

><td class="source">   * be encoded into JSON notation for use in a client-side javascript, or<br></td></tr
><tr
id=sl_svn3_1198

><td class="source">   * decoded from incoming Javascript requests. JSON format is native to<br></td></tr
><tr
id=sl_svn3_1199

><td class="source">   * Javascript, and can be directly eval()&#39;ed with no further parsing<br></td></tr
><tr
id=sl_svn3_1200

><td class="source">   * overhead<br></td></tr
><tr
id=sl_svn3_1201

><td class="source">   *<br></td></tr
><tr
id=sl_svn3_1202

><td class="source">   * All strings should be in ASCII or UTF-8 format!<br></td></tr
><tr
id=sl_svn3_1203

><td class="source">   *<br></td></tr
><tr
id=sl_svn3_1204

><td class="source">   * LICENSE: Redistribution and use in source and binary forms, with or<br></td></tr
><tr
id=sl_svn3_1205

><td class="source">   * without modification, are permitted provided that the following<br></td></tr
><tr
id=sl_svn3_1206

><td class="source">   * conditions are met: Redistributions of source code must retain the<br></td></tr
><tr
id=sl_svn3_1207

><td class="source">   * above copyright notice, this list of conditions and the following<br></td></tr
><tr
id=sl_svn3_1208

><td class="source">   * disclaimer. Redistributions in binary form must reproduce the above<br></td></tr
><tr
id=sl_svn3_1209

><td class="source">   * copyright notice, this list of conditions and the following disclaimer<br></td></tr
><tr
id=sl_svn3_1210

><td class="source">   * in the documentation and/or other materials provided with the<br></td></tr
><tr
id=sl_svn3_1211

><td class="source">   * distribution.<br></td></tr
><tr
id=sl_svn3_1212

><td class="source">   *<br></td></tr
><tr
id=sl_svn3_1213

><td class="source">   * THIS SOFTWARE IS PROVIDED ``AS IS&#39;&#39; AND ANY EXPRESS OR IMPLIED<br></td></tr
><tr
id=sl_svn3_1214

><td class="source">   * WARRANTIES, INCLUDING, BUT NOT LIMITED TO, THE IMPLIED WARRANTIES OF<br></td></tr
><tr
id=sl_svn3_1215

><td class="source">   * MERCHANTABILITY AND FITNESS FOR A PARTICULAR PURPOSE ARE DISCLAIMED. IN<br></td></tr
><tr
id=sl_svn3_1216

><td class="source">   * NO EVENT SHALL CONTRIBUTORS BE LIABLE FOR ANY DIRECT, INDIRECT,<br></td></tr
><tr
id=sl_svn3_1217

><td class="source">   * INCIDENTAL, SPECIAL, EXEMPLARY, OR CONSEQUENTIAL DAMAGES (INCLUDING,<br></td></tr
><tr
id=sl_svn3_1218

><td class="source">   * BUT NOT LIMITED TO, PROCUREMENT OF SUBSTITUTE GOODS OR SERVICES; LOSS<br></td></tr
><tr
id=sl_svn3_1219

><td class="source">   * OF USE, DATA, OR PROFITS; OR BUSINESS INTERRUPTION) HOWEVER CAUSED AND<br></td></tr
><tr
id=sl_svn3_1220

><td class="source">   * ON ANY THEORY OF LIABILITY, WHETHER IN CONTRACT, STRICT LIABILITY, OR<br></td></tr
><tr
id=sl_svn3_1221

><td class="source">   * TORT (INCLUDING NEGLIGENCE OR OTHERWISE) ARISING IN ANY WAY OUT OF THE<br></td></tr
><tr
id=sl_svn3_1222

><td class="source">   * USE OF THIS SOFTWARE, EVEN IF ADVISED OF THE POSSIBILITY OF SUCH<br></td></tr
><tr
id=sl_svn3_1223

><td class="source">   * DAMAGE.<br></td></tr
><tr
id=sl_svn3_1224

><td class="source">   *<br></td></tr
><tr
id=sl_svn3_1225

><td class="source">   * @category<br></td></tr
><tr
id=sl_svn3_1226

><td class="source">   * @package     Services_JSON<br></td></tr
><tr
id=sl_svn3_1227

><td class="source">   * @author      Michal Migurski &lt;mike-json@teczno.com&gt;<br></td></tr
><tr
id=sl_svn3_1228

><td class="source">   * @author      Matt Knapp &lt;mdknapp[at]gmail[dot]com&gt;<br></td></tr
><tr
id=sl_svn3_1229

><td class="source">   * @author      Brett Stimmerman &lt;brettstimmerman[at]gmail[dot]com&gt;<br></td></tr
><tr
id=sl_svn3_1230

><td class="source">   * @author      Christoph Dorn &lt;christoph@christophdorn.com&gt;<br></td></tr
><tr
id=sl_svn3_1231

><td class="source">   * @copyright   2005 Michal Migurski<br></td></tr
><tr
id=sl_svn3_1232

><td class="source">   * @version     CVS: $Id: JSON.php,v 1.31 2006/06/28 05:54:17 migurski Exp $<br></td></tr
><tr
id=sl_svn3_1233

><td class="source">   * @license     http://www.opensource.org/licenses/bsd-license.php<br></td></tr
><tr
id=sl_svn3_1234

><td class="source">   * @link        http://pear.php.net/pepr/pepr-proposal-show.php?id=198<br></td></tr
><tr
id=sl_svn3_1235

><td class="source">   */<br></td></tr
><tr
id=sl_svn3_1236

><td class="source">   <br></td></tr
><tr
id=sl_svn3_1237

><td class="source">     <br></td></tr
><tr
id=sl_svn3_1238

><td class="source">  /**<br></td></tr
><tr
id=sl_svn3_1239

><td class="source">   * Keep a list of objects as we descend into the array so we can detect recursion.<br></td></tr
><tr
id=sl_svn3_1240

><td class="source">   */<br></td></tr
><tr
id=sl_svn3_1241

><td class="source">  private $json_objectStack = array();<br></td></tr
><tr
id=sl_svn3_1242

><td class="source"><br></td></tr
><tr
id=sl_svn3_1243

><td class="source"><br></td></tr
><tr
id=sl_svn3_1244

><td class="source"> /**<br></td></tr
><tr
id=sl_svn3_1245

><td class="source">  * convert a string from one UTF-8 char to one UTF-16 char<br></td></tr
><tr
id=sl_svn3_1246

><td class="source">  *<br></td></tr
><tr
id=sl_svn3_1247

><td class="source">  * Normally should be handled by mb_convert_encoding, but<br></td></tr
><tr
id=sl_svn3_1248

><td class="source">  * provides a slower PHP-only method for installations<br></td></tr
><tr
id=sl_svn3_1249

><td class="source">  * that lack the multibye string extension.<br></td></tr
><tr
id=sl_svn3_1250

><td class="source">  *<br></td></tr
><tr
id=sl_svn3_1251

><td class="source">  * @param    string  $utf8   UTF-8 character<br></td></tr
><tr
id=sl_svn3_1252

><td class="source">  * @return   string  UTF-16 character<br></td></tr
><tr
id=sl_svn3_1253

><td class="source">  * @access   private<br></td></tr
><tr
id=sl_svn3_1254

><td class="source">  */<br></td></tr
><tr
id=sl_svn3_1255

><td class="source">  private function json_utf82utf16($utf8)<br></td></tr
><tr
id=sl_svn3_1256

><td class="source">  {<br></td></tr
><tr
id=sl_svn3_1257

><td class="source">      // oh please oh please oh please oh please oh please<br></td></tr
><tr
id=sl_svn3_1258

><td class="source">      if(function_exists(&#39;mb_convert_encoding&#39;)) {<br></td></tr
><tr
id=sl_svn3_1259

><td class="source">          return mb_convert_encoding($utf8, &#39;UTF-16&#39;, &#39;UTF-8&#39;);<br></td></tr
><tr
id=sl_svn3_1260

><td class="source">      }<br></td></tr
><tr
id=sl_svn3_1261

><td class="source"><br></td></tr
><tr
id=sl_svn3_1262

><td class="source">      switch(strlen($utf8)) {<br></td></tr
><tr
id=sl_svn3_1263

><td class="source">          case 1:<br></td></tr
><tr
id=sl_svn3_1264

><td class="source">              // this case should never be reached, because we are in ASCII range<br></td></tr
><tr
id=sl_svn3_1265

><td class="source">              // see: http://www.cl.cam.ac.uk/~mgk25/unicode.html#utf-8<br></td></tr
><tr
id=sl_svn3_1266

><td class="source">              return $utf8;<br></td></tr
><tr
id=sl_svn3_1267

><td class="source"><br></td></tr
><tr
id=sl_svn3_1268

><td class="source">          case 2:<br></td></tr
><tr
id=sl_svn3_1269

><td class="source">              // return a UTF-16 character from a 2-byte UTF-8 char<br></td></tr
><tr
id=sl_svn3_1270

><td class="source">              // see: http://www.cl.cam.ac.uk/~mgk25/unicode.html#utf-8<br></td></tr
><tr
id=sl_svn3_1271

><td class="source">              return chr(0x07 &amp; (ord($utf8{0}) &gt;&gt; 2))<br></td></tr
><tr
id=sl_svn3_1272

><td class="source">                   . chr((0xC0 &amp; (ord($utf8{0}) &lt;&lt; 6))<br></td></tr
><tr
id=sl_svn3_1273

><td class="source">                       | (0x3F &amp; ord($utf8{1})));<br></td></tr
><tr
id=sl_svn3_1274

><td class="source"><br></td></tr
><tr
id=sl_svn3_1275

><td class="source">          case 3:<br></td></tr
><tr
id=sl_svn3_1276

><td class="source">              // return a UTF-16 character from a 3-byte UTF-8 char<br></td></tr
><tr
id=sl_svn3_1277

><td class="source">              // see: http://www.cl.cam.ac.uk/~mgk25/unicode.html#utf-8<br></td></tr
><tr
id=sl_svn3_1278

><td class="source">              return chr((0xF0 &amp; (ord($utf8{0}) &lt;&lt; 4))<br></td></tr
><tr
id=sl_svn3_1279

><td class="source">                       | (0x0F &amp; (ord($utf8{1}) &gt;&gt; 2)))<br></td></tr
><tr
id=sl_svn3_1280

><td class="source">                   . chr((0xC0 &amp; (ord($utf8{1}) &lt;&lt; 6))<br></td></tr
><tr
id=sl_svn3_1281

><td class="source">                       | (0x7F &amp; ord($utf8{2})));<br></td></tr
><tr
id=sl_svn3_1282

><td class="source">      }<br></td></tr
><tr
id=sl_svn3_1283

><td class="source"><br></td></tr
><tr
id=sl_svn3_1284

><td class="source">      // ignoring UTF-32 for now, sorry<br></td></tr
><tr
id=sl_svn3_1285

><td class="source">      return &#39;&#39;;<br></td></tr
><tr
id=sl_svn3_1286

><td class="source">  }<br></td></tr
><tr
id=sl_svn3_1287

><td class="source"><br></td></tr
><tr
id=sl_svn3_1288

><td class="source"> /**<br></td></tr
><tr
id=sl_svn3_1289

><td class="source">  * encodes an arbitrary variable into JSON format<br></td></tr
><tr
id=sl_svn3_1290

><td class="source">  *<br></td></tr
><tr
id=sl_svn3_1291

><td class="source">  * @param    mixed   $var    any number, boolean, string, array, or object to be encoded.<br></td></tr
><tr
id=sl_svn3_1292

><td class="source">  *                           see argument 1 to Services_JSON() above for array-parsing behavior.<br></td></tr
><tr
id=sl_svn3_1293

><td class="source">  *                           if var is a strng, note that encode() always expects it<br></td></tr
><tr
id=sl_svn3_1294

><td class="source">  *                           to be in ASCII or UTF-8 format!<br></td></tr
><tr
id=sl_svn3_1295

><td class="source">  *<br></td></tr
><tr
id=sl_svn3_1296

><td class="source">  * @return   mixed   JSON string representation of input var or an error if a problem occurs<br></td></tr
><tr
id=sl_svn3_1297

><td class="source">  * @access   public<br></td></tr
><tr
id=sl_svn3_1298

><td class="source">  */<br></td></tr
><tr
id=sl_svn3_1299

><td class="source">  private function json_encode($var)<br></td></tr
><tr
id=sl_svn3_1300

><td class="source">  {<br></td></tr
><tr
id=sl_svn3_1301

><td class="source">    <br></td></tr
><tr
id=sl_svn3_1302

><td class="source">    if(is_object($var)) {<br></td></tr
><tr
id=sl_svn3_1303

><td class="source">      if(in_array($var,$this-&gt;json_objectStack)) {<br></td></tr
><tr
id=sl_svn3_1304

><td class="source">        return &#39;&quot;** Recursion **&quot;&#39;;<br></td></tr
><tr
id=sl_svn3_1305

><td class="source">      }<br></td></tr
><tr
id=sl_svn3_1306

><td class="source">    }<br></td></tr
><tr
id=sl_svn3_1307

><td class="source">          <br></td></tr
><tr
id=sl_svn3_1308

><td class="source">      switch (gettype($var)) {<br></td></tr
><tr
id=sl_svn3_1309

><td class="source">          case &#39;boolean&#39;:<br></td></tr
><tr
id=sl_svn3_1310

><td class="source">              return $var ? &#39;true&#39; : &#39;false&#39;;<br></td></tr
><tr
id=sl_svn3_1311

><td class="source"><br></td></tr
><tr
id=sl_svn3_1312

><td class="source">          case &#39;NULL&#39;:<br></td></tr
><tr
id=sl_svn3_1313

><td class="source">              return &#39;null&#39;;<br></td></tr
><tr
id=sl_svn3_1314

><td class="source"><br></td></tr
><tr
id=sl_svn3_1315

><td class="source">          case &#39;integer&#39;:<br></td></tr
><tr
id=sl_svn3_1316

><td class="source">              return (int) $var;<br></td></tr
><tr
id=sl_svn3_1317

><td class="source"><br></td></tr
><tr
id=sl_svn3_1318

><td class="source">          case &#39;double&#39;:<br></td></tr
><tr
id=sl_svn3_1319

><td class="source">          case &#39;float&#39;:<br></td></tr
><tr
id=sl_svn3_1320

><td class="source">              return (float) $var;<br></td></tr
><tr
id=sl_svn3_1321

><td class="source"><br></td></tr
><tr
id=sl_svn3_1322

><td class="source">          case &#39;string&#39;:<br></td></tr
><tr
id=sl_svn3_1323

><td class="source">              // STRINGS ARE EXPECTED TO BE IN ASCII OR UTF-8 FORMAT<br></td></tr
><tr
id=sl_svn3_1324

><td class="source">              $ascii = &#39;&#39;;<br></td></tr
><tr
id=sl_svn3_1325

><td class="source">              $strlen_var = strlen($var);<br></td></tr
><tr
id=sl_svn3_1326

><td class="source"><br></td></tr
><tr
id=sl_svn3_1327

><td class="source">             /*<br></td></tr
><tr
id=sl_svn3_1328

><td class="source">              * Iterate over every character in the string,<br></td></tr
><tr
id=sl_svn3_1329

><td class="source">              * escaping with a slash or encoding to UTF-8 where necessary<br></td></tr
><tr
id=sl_svn3_1330

><td class="source">              */<br></td></tr
><tr
id=sl_svn3_1331

><td class="source">              for ($c = 0; $c &lt; $strlen_var; ++$c) {<br></td></tr
><tr
id=sl_svn3_1332

><td class="source"><br></td></tr
><tr
id=sl_svn3_1333

><td class="source">                  $ord_var_c = ord($var{$c});<br></td></tr
><tr
id=sl_svn3_1334

><td class="source"><br></td></tr
><tr
id=sl_svn3_1335

><td class="source">                  switch (true) {<br></td></tr
><tr
id=sl_svn3_1336

><td class="source">                      case $ord_var_c == 0x08:<br></td></tr
><tr
id=sl_svn3_1337

><td class="source">                          $ascii .= &#39;\b&#39;;<br></td></tr
><tr
id=sl_svn3_1338

><td class="source">                          break;<br></td></tr
><tr
id=sl_svn3_1339

><td class="source">                      case $ord_var_c == 0x09:<br></td></tr
><tr
id=sl_svn3_1340

><td class="source">                          $ascii .= &#39;\t&#39;;<br></td></tr
><tr
id=sl_svn3_1341

><td class="source">                          break;<br></td></tr
><tr
id=sl_svn3_1342

><td class="source">                      case $ord_var_c == 0x0A:<br></td></tr
><tr
id=sl_svn3_1343

><td class="source">                          $ascii .= &#39;\n&#39;;<br></td></tr
><tr
id=sl_svn3_1344

><td class="source">                          break;<br></td></tr
><tr
id=sl_svn3_1345

><td class="source">                      case $ord_var_c == 0x0C:<br></td></tr
><tr
id=sl_svn3_1346

><td class="source">                          $ascii .= &#39;\f&#39;;<br></td></tr
><tr
id=sl_svn3_1347

><td class="source">                          break;<br></td></tr
><tr
id=sl_svn3_1348

><td class="source">                      case $ord_var_c == 0x0D:<br></td></tr
><tr
id=sl_svn3_1349

><td class="source">                          $ascii .= &#39;\r&#39;;<br></td></tr
><tr
id=sl_svn3_1350

><td class="source">                          break;<br></td></tr
><tr
id=sl_svn3_1351

><td class="source"><br></td></tr
><tr
id=sl_svn3_1352

><td class="source">                      case $ord_var_c == 0x22:<br></td></tr
><tr
id=sl_svn3_1353

><td class="source">                      case $ord_var_c == 0x2F:<br></td></tr
><tr
id=sl_svn3_1354

><td class="source">                      case $ord_var_c == 0x5C:<br></td></tr
><tr
id=sl_svn3_1355

><td class="source">                          // double quote, slash, slosh<br></td></tr
><tr
id=sl_svn3_1356

><td class="source">                          $ascii .= &#39;\\&#39;.$var{$c};<br></td></tr
><tr
id=sl_svn3_1357

><td class="source">                          break;<br></td></tr
><tr
id=sl_svn3_1358

><td class="source"><br></td></tr
><tr
id=sl_svn3_1359

><td class="source">                      case (($ord_var_c &gt;= 0x20) &amp;&amp; ($ord_var_c &lt;= 0x7F)):<br></td></tr
><tr
id=sl_svn3_1360

><td class="source">                          // characters U-00000000 - U-0000007F (same as ASCII)<br></td></tr
><tr
id=sl_svn3_1361

><td class="source">                          $ascii .= $var{$c};<br></td></tr
><tr
id=sl_svn3_1362

><td class="source">                          break;<br></td></tr
><tr
id=sl_svn3_1363

><td class="source"><br></td></tr
><tr
id=sl_svn3_1364

><td class="source">                      case (($ord_var_c &amp; 0xE0) == 0xC0):<br></td></tr
><tr
id=sl_svn3_1365

><td class="source">                          // characters U-00000080 - U-000007FF, mask 110XXXXX<br></td></tr
><tr
id=sl_svn3_1366

><td class="source">                          // see http://www.cl.cam.ac.uk/~mgk25/unicode.html#utf-8<br></td></tr
><tr
id=sl_svn3_1367

><td class="source">                          $char = pack(&#39;C*&#39;, $ord_var_c, ord($var{$c + 1}));<br></td></tr
><tr
id=sl_svn3_1368

><td class="source">                          $c += 1;<br></td></tr
><tr
id=sl_svn3_1369

><td class="source">                          $utf16 = $this-&gt;json_utf82utf16($char);<br></td></tr
><tr
id=sl_svn3_1370

><td class="source">                          $ascii .= sprintf(&#39;\u%04s&#39;, bin2hex($utf16));<br></td></tr
><tr
id=sl_svn3_1371

><td class="source">                          break;<br></td></tr
><tr
id=sl_svn3_1372

><td class="source"><br></td></tr
><tr
id=sl_svn3_1373

><td class="source">                      case (($ord_var_c &amp; 0xF0) == 0xE0):<br></td></tr
><tr
id=sl_svn3_1374

><td class="source">                          // characters U-00000800 - U-0000FFFF, mask 1110XXXX<br></td></tr
><tr
id=sl_svn3_1375

><td class="source">                          // see http://www.cl.cam.ac.uk/~mgk25/unicode.html#utf-8<br></td></tr
><tr
id=sl_svn3_1376

><td class="source">                          $char = pack(&#39;C*&#39;, $ord_var_c,<br></td></tr
><tr
id=sl_svn3_1377

><td class="source">                                       ord($var{$c + 1}),<br></td></tr
><tr
id=sl_svn3_1378

><td class="source">                                       ord($var{$c + 2}));<br></td></tr
><tr
id=sl_svn3_1379

><td class="source">                          $c += 2;<br></td></tr
><tr
id=sl_svn3_1380

><td class="source">                          $utf16 = $this-&gt;json_utf82utf16($char);<br></td></tr
><tr
id=sl_svn3_1381

><td class="source">                          $ascii .= sprintf(&#39;\u%04s&#39;, bin2hex($utf16));<br></td></tr
><tr
id=sl_svn3_1382

><td class="source">                          break;<br></td></tr
><tr
id=sl_svn3_1383

><td class="source"><br></td></tr
><tr
id=sl_svn3_1384

><td class="source">                      case (($ord_var_c &amp; 0xF8) == 0xF0):<br></td></tr
><tr
id=sl_svn3_1385

><td class="source">                          // characters U-00010000 - U-001FFFFF, mask 11110XXX<br></td></tr
><tr
id=sl_svn3_1386

><td class="source">                          // see http://www.cl.cam.ac.uk/~mgk25/unicode.html#utf-8<br></td></tr
><tr
id=sl_svn3_1387

><td class="source">                          $char = pack(&#39;C*&#39;, $ord_var_c,<br></td></tr
><tr
id=sl_svn3_1388

><td class="source">                                       ord($var{$c + 1}),<br></td></tr
><tr
id=sl_svn3_1389

><td class="source">                                       ord($var{$c + 2}),<br></td></tr
><tr
id=sl_svn3_1390

><td class="source">                                       ord($var{$c + 3}));<br></td></tr
><tr
id=sl_svn3_1391

><td class="source">                          $c += 3;<br></td></tr
><tr
id=sl_svn3_1392

><td class="source">                          $utf16 = $this-&gt;json_utf82utf16($char);<br></td></tr
><tr
id=sl_svn3_1393

><td class="source">                          $ascii .= sprintf(&#39;\u%04s&#39;, bin2hex($utf16));<br></td></tr
><tr
id=sl_svn3_1394

><td class="source">                          break;<br></td></tr
><tr
id=sl_svn3_1395

><td class="source"><br></td></tr
><tr
id=sl_svn3_1396

><td class="source">                      case (($ord_var_c &amp; 0xFC) == 0xF8):<br></td></tr
><tr
id=sl_svn3_1397

><td class="source">                          // characters U-00200000 - U-03FFFFFF, mask 111110XX<br></td></tr
><tr
id=sl_svn3_1398

><td class="source">                          // see http://www.cl.cam.ac.uk/~mgk25/unicode.html#utf-8<br></td></tr
><tr
id=sl_svn3_1399

><td class="source">                          $char = pack(&#39;C*&#39;, $ord_var_c,<br></td></tr
><tr
id=sl_svn3_1400

><td class="source">                                       ord($var{$c + 1}),<br></td></tr
><tr
id=sl_svn3_1401

><td class="source">                                       ord($var{$c + 2}),<br></td></tr
><tr
id=sl_svn3_1402

><td class="source">                                       ord($var{$c + 3}),<br></td></tr
><tr
id=sl_svn3_1403

><td class="source">                                       ord($var{$c + 4}));<br></td></tr
><tr
id=sl_svn3_1404

><td class="source">                          $c += 4;<br></td></tr
><tr
id=sl_svn3_1405

><td class="source">                          $utf16 = $this-&gt;json_utf82utf16($char);<br></td></tr
><tr
id=sl_svn3_1406

><td class="source">                          $ascii .= sprintf(&#39;\u%04s&#39;, bin2hex($utf16));<br></td></tr
><tr
id=sl_svn3_1407

><td class="source">                          break;<br></td></tr
><tr
id=sl_svn3_1408

><td class="source"><br></td></tr
><tr
id=sl_svn3_1409

><td class="source">                      case (($ord_var_c &amp; 0xFE) == 0xFC):<br></td></tr
><tr
id=sl_svn3_1410

><td class="source">                          // characters U-04000000 - U-7FFFFFFF, mask 1111110X<br></td></tr
><tr
id=sl_svn3_1411

><td class="source">                          // see http://www.cl.cam.ac.uk/~mgk25/unicode.html#utf-8<br></td></tr
><tr
id=sl_svn3_1412

><td class="source">                          $char = pack(&#39;C*&#39;, $ord_var_c,<br></td></tr
><tr
id=sl_svn3_1413

><td class="source">                                       ord($var{$c + 1}),<br></td></tr
><tr
id=sl_svn3_1414

><td class="source">                                       ord($var{$c + 2}),<br></td></tr
><tr
id=sl_svn3_1415

><td class="source">                                       ord($var{$c + 3}),<br></td></tr
><tr
id=sl_svn3_1416

><td class="source">                                       ord($var{$c + 4}),<br></td></tr
><tr
id=sl_svn3_1417

><td class="source">                                       ord($var{$c + 5}));<br></td></tr
><tr
id=sl_svn3_1418

><td class="source">                          $c += 5;<br></td></tr
><tr
id=sl_svn3_1419

><td class="source">                          $utf16 = $this-&gt;json_utf82utf16($char);<br></td></tr
><tr
id=sl_svn3_1420

><td class="source">                          $ascii .= sprintf(&#39;\u%04s&#39;, bin2hex($utf16));<br></td></tr
><tr
id=sl_svn3_1421

><td class="source">                          break;<br></td></tr
><tr
id=sl_svn3_1422

><td class="source">                  }<br></td></tr
><tr
id=sl_svn3_1423

><td class="source">              }<br></td></tr
><tr
id=sl_svn3_1424

><td class="source"><br></td></tr
><tr
id=sl_svn3_1425

><td class="source">              return &#39;&quot;&#39;.$ascii.&#39;&quot;&#39;;<br></td></tr
><tr
id=sl_svn3_1426

><td class="source"><br></td></tr
><tr
id=sl_svn3_1427

><td class="source">          case &#39;array&#39;:<br></td></tr
><tr
id=sl_svn3_1428

><td class="source">             /*<br></td></tr
><tr
id=sl_svn3_1429

><td class="source">              * As per JSON spec if any array key is not an integer<br></td></tr
><tr
id=sl_svn3_1430

><td class="source">              * we must treat the the whole array as an object. We<br></td></tr
><tr
id=sl_svn3_1431

><td class="source">              * also try to catch a sparsely populated associative<br></td></tr
><tr
id=sl_svn3_1432

><td class="source">              * array with numeric keys here because some JS engines<br></td></tr
><tr
id=sl_svn3_1433

><td class="source">              * will create an array with empty indexes up to<br></td></tr
><tr
id=sl_svn3_1434

><td class="source">              * max_index which can cause memory issues and because<br></td></tr
><tr
id=sl_svn3_1435

><td class="source">              * the keys, which may be relevant, will be remapped<br></td></tr
><tr
id=sl_svn3_1436

><td class="source">              * otherwise.<br></td></tr
><tr
id=sl_svn3_1437

><td class="source">              *<br></td></tr
><tr
id=sl_svn3_1438

><td class="source">              * As per the ECMA and JSON specification an object may<br></td></tr
><tr
id=sl_svn3_1439

><td class="source">              * have any string as a property. Unfortunately due to<br></td></tr
><tr
id=sl_svn3_1440

><td class="source">              * a hole in the ECMA specification if the key is a<br></td></tr
><tr
id=sl_svn3_1441

><td class="source">              * ECMA reserved word or starts with a digit the<br></td></tr
><tr
id=sl_svn3_1442

><td class="source">              * parameter is only accessible using ECMAScript&#39;s<br></td></tr
><tr
id=sl_svn3_1443

><td class="source">              * bracket notation.<br></td></tr
><tr
id=sl_svn3_1444

><td class="source">              */<br></td></tr
><tr
id=sl_svn3_1445

><td class="source"><br></td></tr
><tr
id=sl_svn3_1446

><td class="source">              // treat as a JSON object<br></td></tr
><tr
id=sl_svn3_1447

><td class="source">              if (is_array($var) &amp;&amp; count($var) &amp;&amp; (array_keys($var) !== range(0, sizeof($var) - 1))) {<br></td></tr
><tr
id=sl_svn3_1448

><td class="source">                  <br></td></tr
><tr
id=sl_svn3_1449

><td class="source">                  $this-&gt;json_objectStack[] = $var;<br></td></tr
><tr
id=sl_svn3_1450

><td class="source"><br></td></tr
><tr
id=sl_svn3_1451

><td class="source">                  $properties = array_map(array($this, &#39;json_name_value&#39;),<br></td></tr
><tr
id=sl_svn3_1452

><td class="source">                                          array_keys($var),<br></td></tr
><tr
id=sl_svn3_1453

><td class="source">                                          array_values($var));<br></td></tr
><tr
id=sl_svn3_1454

><td class="source"><br></td></tr
><tr
id=sl_svn3_1455

><td class="source">                  array_pop($this-&gt;json_objectStack);<br></td></tr
><tr
id=sl_svn3_1456

><td class="source"><br></td></tr
><tr
id=sl_svn3_1457

><td class="source">                  foreach($properties as $property) {<br></td></tr
><tr
id=sl_svn3_1458

><td class="source">                      if($property instanceof Exception) {<br></td></tr
><tr
id=sl_svn3_1459

><td class="source">                          return $property;<br></td></tr
><tr
id=sl_svn3_1460

><td class="source">                      }<br></td></tr
><tr
id=sl_svn3_1461

><td class="source">                  }<br></td></tr
><tr
id=sl_svn3_1462

><td class="source"><br></td></tr
><tr
id=sl_svn3_1463

><td class="source">                  return &#39;{&#39; . join(&#39;,&#39;, $properties) . &#39;}&#39;;<br></td></tr
><tr
id=sl_svn3_1464

><td class="source">              }<br></td></tr
><tr
id=sl_svn3_1465

><td class="source"><br></td></tr
><tr
id=sl_svn3_1466

><td class="source">              $this-&gt;json_objectStack[] = $var;<br></td></tr
><tr
id=sl_svn3_1467

><td class="source"><br></td></tr
><tr
id=sl_svn3_1468

><td class="source">              // treat it like a regular array<br></td></tr
><tr
id=sl_svn3_1469

><td class="source">              $elements = array_map(array($this, &#39;json_encode&#39;), $var);<br></td></tr
><tr
id=sl_svn3_1470

><td class="source"><br></td></tr
><tr
id=sl_svn3_1471

><td class="source">              array_pop($this-&gt;json_objectStack);<br></td></tr
><tr
id=sl_svn3_1472

><td class="source"><br></td></tr
><tr
id=sl_svn3_1473

><td class="source">              foreach($elements as $element) {<br></td></tr
><tr
id=sl_svn3_1474

><td class="source">                  if($element instanceof Exception) {<br></td></tr
><tr
id=sl_svn3_1475

><td class="source">                      return $element;<br></td></tr
><tr
id=sl_svn3_1476

><td class="source">                  }<br></td></tr
><tr
id=sl_svn3_1477

><td class="source">              }<br></td></tr
><tr
id=sl_svn3_1478

><td class="source"><br></td></tr
><tr
id=sl_svn3_1479

><td class="source">              return &#39;[&#39; . join(&#39;,&#39;, $elements) . &#39;]&#39;;<br></td></tr
><tr
id=sl_svn3_1480

><td class="source"><br></td></tr
><tr
id=sl_svn3_1481

><td class="source">          case &#39;object&#39;:<br></td></tr
><tr
id=sl_svn3_1482

><td class="source">              $vars = self::encodeObject($var);<br></td></tr
><tr
id=sl_svn3_1483

><td class="source"><br></td></tr
><tr
id=sl_svn3_1484

><td class="source">              $this-&gt;json_objectStack[] = $var;<br></td></tr
><tr
id=sl_svn3_1485

><td class="source"><br></td></tr
><tr
id=sl_svn3_1486

><td class="source">              $properties = array_map(array($this, &#39;json_name_value&#39;),<br></td></tr
><tr
id=sl_svn3_1487

><td class="source">                                      array_keys($vars),<br></td></tr
><tr
id=sl_svn3_1488

><td class="source">                                      array_values($vars));<br></td></tr
><tr
id=sl_svn3_1489

><td class="source"><br></td></tr
><tr
id=sl_svn3_1490

><td class="source">              array_pop($this-&gt;json_objectStack);<br></td></tr
><tr
id=sl_svn3_1491

><td class="source">              <br></td></tr
><tr
id=sl_svn3_1492

><td class="source">              foreach($properties as $property) {<br></td></tr
><tr
id=sl_svn3_1493

><td class="source">                  if($property instanceof Exception) {<br></td></tr
><tr
id=sl_svn3_1494

><td class="source">                      return $property;<br></td></tr
><tr
id=sl_svn3_1495

><td class="source">                  }<br></td></tr
><tr
id=sl_svn3_1496

><td class="source">              }<br></td></tr
><tr
id=sl_svn3_1497

><td class="source">                     <br></td></tr
><tr
id=sl_svn3_1498

><td class="source">              return &#39;{&#39; . join(&#39;,&#39;, $properties) . &#39;}&#39;;<br></td></tr
><tr
id=sl_svn3_1499

><td class="source"><br></td></tr
><tr
id=sl_svn3_1500

><td class="source">          default:<br></td></tr
><tr
id=sl_svn3_1501

><td class="source">              return null;<br></td></tr
><tr
id=sl_svn3_1502

><td class="source">      }<br></td></tr
><tr
id=sl_svn3_1503

><td class="source">  }<br></td></tr
><tr
id=sl_svn3_1504

><td class="source"><br></td></tr
><tr
id=sl_svn3_1505

><td class="source"> /**<br></td></tr
><tr
id=sl_svn3_1506

><td class="source">  * array-walking function for use in generating JSON-formatted name-value pairs<br></td></tr
><tr
id=sl_svn3_1507

><td class="source">  *<br></td></tr
><tr
id=sl_svn3_1508

><td class="source">  * @param    string  $name   name of key to use<br></td></tr
><tr
id=sl_svn3_1509

><td class="source">  * @param    mixed   $value  reference to an array element to be encoded<br></td></tr
><tr
id=sl_svn3_1510

><td class="source">  *<br></td></tr
><tr
id=sl_svn3_1511

><td class="source">  * @return   string  JSON-formatted name-value pair, like &#39;&quot;name&quot;:value&#39;<br></td></tr
><tr
id=sl_svn3_1512

><td class="source">  * @access   private<br></td></tr
><tr
id=sl_svn3_1513

><td class="source">  */<br></td></tr
><tr
id=sl_svn3_1514

><td class="source">  private function json_name_value($name, $value)<br></td></tr
><tr
id=sl_svn3_1515

><td class="source">  {<br></td></tr
><tr
id=sl_svn3_1516

><td class="source">      // Encoding the $GLOBALS PHP array causes an infinite loop<br></td></tr
><tr
id=sl_svn3_1517

><td class="source">      // if the recursion is not reset here as it contains<br></td></tr
><tr
id=sl_svn3_1518

><td class="source">      // a reference to itself. This is the only way I have come up<br></td></tr
><tr
id=sl_svn3_1519

><td class="source">      // with to stop infinite recursion in this case.<br></td></tr
><tr
id=sl_svn3_1520

><td class="source">      if($name==&#39;GLOBALS&#39;<br></td></tr
><tr
id=sl_svn3_1521

><td class="source">         &amp;&amp; is_array($value)<br></td></tr
><tr
id=sl_svn3_1522

><td class="source">         &amp;&amp; array_key_exists(&#39;GLOBALS&#39;,$value)) {<br></td></tr
><tr
id=sl_svn3_1523

><td class="source">        $value[&#39;GLOBALS&#39;] = &#39;** Recursion **&#39;;<br></td></tr
><tr
id=sl_svn3_1524

><td class="source">      }<br></td></tr
><tr
id=sl_svn3_1525

><td class="source">    <br></td></tr
><tr
id=sl_svn3_1526

><td class="source">      $encoded_value = $this-&gt;json_encode($value);<br></td></tr
><tr
id=sl_svn3_1527

><td class="source"><br></td></tr
><tr
id=sl_svn3_1528

><td class="source">      if($encoded_value instanceof Exception) {<br></td></tr
><tr
id=sl_svn3_1529

><td class="source">          return $encoded_value;<br></td></tr
><tr
id=sl_svn3_1530

><td class="source">      }<br></td></tr
><tr
id=sl_svn3_1531

><td class="source"><br></td></tr
><tr
id=sl_svn3_1532

><td class="source">      return $this-&gt;json_encode(strval($name)) . &#39;:&#39; . $encoded_value;<br></td></tr
><tr
id=sl_svn3_1533

><td class="source">  }<br></td></tr
><tr
id=sl_svn3_1534

><td class="source">}<br></td></tr
></table></pre>
<pre><table width="100%"><tr class="cursor_stop cursor_hidden"><td></td></tr></table></pre>
</td>
</tr></table>

 
<script type="text/javascript">
 var lineNumUnderMouse = -1;
 
 function gutterOver(num) {
 gutterOut();
 var newTR = document.getElementById('gr_svn3_' + num);
 if (newTR) {
 newTR.className = 'undermouse';
 }
 lineNumUnderMouse = num;
 }
 function gutterOut() {
 if (lineNumUnderMouse != -1) {
 var oldTR = document.getElementById(
 'gr_svn3_' + lineNumUnderMouse);
 if (oldTR) {
 oldTR.className = '';
 }
 lineNumUnderMouse = -1;
 }
 }
 var numsGenState = {table_base_id: 'nums_table_'};
 var srcGenState = {table_base_id: 'src_table_'};
 var alignerRunning = false;
 var startOver = false;
 function setLineNumberHeights() {
 if (alignerRunning) {
 startOver = true;
 return;
 }
 numsGenState.chunk_id = 0;
 numsGenState.table = document.getElementById('nums_table_0');
 numsGenState.row_num = 0;
 if (!numsGenState.table) {
 return; // Silently exit if no file is present.
 }
 srcGenState.chunk_id = 0;
 srcGenState.table = document.getElementById('src_table_0');
 srcGenState.row_num = 0;
 alignerRunning = true;
 continueToSetLineNumberHeights();
 }
 function rowGenerator(genState) {
 if (genState.row_num < genState.table.rows.length) {
 var currentRow = genState.table.rows[genState.row_num];
 genState.row_num++;
 return currentRow;
 }
 var newTable = document.getElementById(
 genState.table_base_id + (genState.chunk_id + 1));
 if (newTable) {
 genState.chunk_id++;
 genState.row_num = 0;
 genState.table = newTable;
 return genState.table.rows[0];
 }
 return null;
 }
 var MAX_ROWS_PER_PASS = 1000;
 function continueToSetLineNumberHeights() {
 var rowsInThisPass = 0;
 var numRow = 1;
 var srcRow = 1;
 while (numRow && srcRow && rowsInThisPass < MAX_ROWS_PER_PASS) {
 numRow = rowGenerator(numsGenState);
 srcRow = rowGenerator(srcGenState);
 rowsInThisPass++;
 if (numRow && srcRow) {
 if (numRow.offsetHeight != srcRow.offsetHeight) {
 numRow.firstChild.style.height = srcRow.offsetHeight + 'px';
 }
 }
 }
 if (rowsInThisPass >= MAX_ROWS_PER_PASS) {
 setTimeout(continueToSetLineNumberHeights, 10);
 } else {
 alignerRunning = false;
 if (startOver) {
 startOver = false;
 setTimeout(setLineNumberHeights, 500);
 }
 }
 }
 function initLineNumberHeights() {
 // Do 2 complete passes, because there can be races
 // between this code and prettify.
 startOver = true;
 setTimeout(setLineNumberHeights, 250);
 window.onresize = setLineNumberHeights;
 }
 initLineNumberHeights();
</script>

 
 
 <div id="log">
 <div style="text-align:right">
 <a class="ifCollapse" href="#" onclick="_toggleMeta(this); return false">Show details</a>
 <a class="ifExpand" href="#" onclick="_toggleMeta(this); return false">Hide details</a>
 </div>
 <div class="ifExpand">
 
 
 <div class="pmeta_bubble_bg" style="border:1px solid white">
 <div class="round4"></div>
 <div class="round2"></div>
 <div class="round1"></div>
 <div class="box-inner">
 <div id="changelog">
 <p>Change log</p>
 <div>
 <a href="/p/yii-firephp/source/detail?spec=svn3&amp;r=3">r3</a>
 by scythah
 on Jan 20, 2010
 &nbsp; <a href="/p/yii-firephp/source/diff?spec=svn3&r=3&amp;format=side&amp;path=/trunk/FirePHP.php&amp;old_path=/trunk/FirePHP.php&amp;old=2">Diff</a>
 </div>
 <pre>Updated to skip logging processes in the
stack trace.</pre>
 </div>
 
 
 
 
 
 
 <script type="text/javascript">
 var detail_url = '/p/yii-firephp/source/detail?r=3&spec=svn3';
 var publish_url = '/p/yii-firephp/source/detail?r=3&spec=svn3#publish';
 // describe the paths of this revision in javascript.
 var changed_paths = [];
 var changed_urls = [];
 
 changed_paths.push('/trunk/EFirephp.php');
 changed_urls.push('/p/yii-firephp/source/browse/trunk/EFirephp.php?r\x3d3\x26spec\x3dsvn3');
 
 
 changed_paths.push('/trunk/FirePHP.php');
 changed_urls.push('/p/yii-firephp/source/browse/trunk/FirePHP.php?r\x3d3\x26spec\x3dsvn3');
 
 var selected_path = '/trunk/FirePHP.php';
 
 
 function getCurrentPageIndex() {
 for (var i = 0; i < changed_paths.length; i++) {
 if (selected_path == changed_paths[i]) {
 return i;
 }
 }
 }
 function getNextPage() {
 var i = getCurrentPageIndex();
 if (i < changed_paths.length - 1) {
 return changed_urls[i + 1];
 }
 return null;
 }
 function getPreviousPage() {
 var i = getCurrentPageIndex();
 if (i > 0) {
 return changed_urls[i - 1];
 }
 return null;
 }
 function gotoNextPage() {
 var page = getNextPage();
 if (!page) {
 page = detail_url;
 }
 window.location = page;
 }
 function gotoPreviousPage() {
 var page = getPreviousPage();
 if (!page) {
 page = detail_url;
 }
 window.location = page;
 }
 function gotoDetailPage() {
 window.location = detail_url;
 }
 function gotoPublishPage() {
 window.location = publish_url;
 }
</script>

 
 <style type="text/css">
 #review_nav {
 border-top: 3px solid white;
 padding-top: 6px;
 margin-top: 1em;
 }
 #review_nav td {
 vertical-align: middle;
 }
 #review_nav select {
 margin: .5em 0;
 }
 </style>
 <div id="review_nav">
 <table><tr><td>Go to:&nbsp;</td><td>
 <select name="files_in_rev" onchange="window.location=this.value">
 
 <option value="/p/yii-firephp/source/browse/trunk/EFirephp.php?r=3&amp;spec=svn3"
 
 >/trunk/EFirephp.php</option>
 
 <option value="/p/yii-firephp/source/browse/trunk/FirePHP.php?r=3&amp;spec=svn3"
 selected="selected"
 >/trunk/FirePHP.php</option>
 
 </select>
 </td></tr></table>
 
 
 



 
 </div>
 
 
 </div>
 <div class="round1"></div>
 <div class="round2"></div>
 <div class="round4"></div>
 </div>
 <div class="pmeta_bubble_bg" style="border:1px solid white">
 <div class="round4"></div>
 <div class="round2"></div>
 <div class="round1"></div>
 <div class="box-inner">
 <div id="older_bubble">
 <p>Older revisions</p>
 
 
 <div class="closed" style="margin-bottom:3px;" >
 <a class="ifClosed" onclick="return _toggleHidden(this)"><img src="https://ssl.gstatic.com/codesite/ph/images/plus.gif" ></a>
 <a class="ifOpened" onclick="return _toggleHidden(this)"><img src="https://ssl.gstatic.com/codesite/ph/images/minus.gif" ></a>
 <a href="/p/yii-firephp/source/detail?spec=svn3&r=2">r2</a>
 by scythah
 on Jan 15, 2010
 &nbsp; <a href="/p/yii-firephp/source/diff?spec=svn3&r=2&amp;format=side&amp;path=/trunk/FirePHP.php&amp;old_path=/trunk/FirePHP.php&amp;old=">Diff</a>
 <br>
 <pre class="ifOpened">Initial release.</pre>
 </div>
 
 
 <a href="/p/yii-firephp/source/list?path=/trunk/FirePHP.php&start=3">All revisions of this file</a>
 </div>
 </div>
 <div class="round1"></div>
 <div class="round2"></div>
 <div class="round4"></div>
 </div>
 
 <div class="pmeta_bubble_bg" style="border:1px solid white">
 <div class="round4"></div>
 <div class="round2"></div>
 <div class="round1"></div>
 <div class="box-inner">
 <div id="fileinfo_bubble">
 <p>File info</p>
 
 <div>Size: 49199 bytes,
 1534 lines</div>
 
 <div><a href="//yii-firephp.googlecode.com/svn/trunk/FirePHP.php">View raw file</a></div>
 </div>
 
 </div>
 <div class="round1"></div>
 <div class="round2"></div>
 <div class="round4"></div>
 </div>
 </div>
 </div>


</div>

</div>
</div>

<script src="https://ssl.gstatic.com/codesite/ph/1729405847801014513/js/prettify/prettify.js"></script>
<script type="text/javascript">prettyPrint();</script>


<script src="https://ssl.gstatic.com/codesite/ph/1729405847801014513/js/source_file_scripts.js"></script>

 <script type="text/javascript" src="https://ssl.gstatic.com/codesite/ph/1729405847801014513/js/kibbles.js"></script>
 <script type="text/javascript">
 var lastStop = null;
 var initialized = false;
 
 function updateCursor(next, prev) {
 if (prev && prev.element) {
 prev.element.className = 'cursor_stop cursor_hidden';
 }
 if (next && next.element) {
 next.element.className = 'cursor_stop cursor';
 lastStop = next.index;
 }
 }
 
 function pubRevealed(data) {
 updateCursorForCell(data.cellId, 'cursor_stop cursor_hidden');
 if (initialized) {
 reloadCursors();
 }
 }
 
 function draftRevealed(data) {
 updateCursorForCell(data.cellId, 'cursor_stop cursor_hidden');
 if (initialized) {
 reloadCursors();
 }
 }
 
 function draftDestroyed(data) {
 updateCursorForCell(data.cellId, 'nocursor');
 if (initialized) {
 reloadCursors();
 }
 }
 function reloadCursors() {
 kibbles.skipper.reset();
 loadCursors();
 if (lastStop != null) {
 kibbles.skipper.setCurrentStop(lastStop);
 }
 }
 // possibly the simplest way to insert any newly added comments
 // is to update the class of the corresponding cursor row,
 // then refresh the entire list of rows.
 function updateCursorForCell(cellId, className) {
 var cell = document.getElementById(cellId);
 // we have to go two rows back to find the cursor location
 var row = getPreviousElement(cell.parentNode);
 row.className = className;
 }
 // returns the previous element, ignores text nodes.
 function getPreviousElement(e) {
 var element = e.previousSibling;
 if (element.nodeType == 3) {
 element = element.previousSibling;
 }
 if (element && element.tagName) {
 return element;
 }
 }
 function loadCursors() {
 // register our elements with skipper
 var elements = CR_getElements('*', 'cursor_stop');
 var len = elements.length;
 for (var i = 0; i < len; i++) {
 var element = elements[i]; 
 element.className = 'cursor_stop cursor_hidden';
 kibbles.skipper.append(element);
 }
 }
 function toggleComments() {
 CR_toggleCommentDisplay();
 reloadCursors();
 }
 function keysOnLoadHandler() {
 // setup skipper
 kibbles.skipper.addStopListener(
 kibbles.skipper.LISTENER_TYPE.PRE, updateCursor);
 // Set the 'offset' option to return the middle of the client area
 // an option can be a static value, or a callback
 kibbles.skipper.setOption('padding_top', 50);
 // Set the 'offset' option to return the middle of the client area
 // an option can be a static value, or a callback
 kibbles.skipper.setOption('padding_bottom', 100);
 // Register our keys
 kibbles.skipper.addFwdKey("n");
 kibbles.skipper.addRevKey("p");
 kibbles.keys.addKeyPressListener(
 'u', function() { window.location = detail_url; });
 kibbles.keys.addKeyPressListener(
 'r', function() { window.location = detail_url + '#publish'; });
 
 kibbles.keys.addKeyPressListener('j', gotoNextPage);
 kibbles.keys.addKeyPressListener('k', gotoPreviousPage);
 
 
 }
 </script>
<script src="https://ssl.gstatic.com/codesite/ph/1729405847801014513/js/code_review_scripts.js"></script>
<script type="text/javascript">
 function showPublishInstructions() {
 var element = document.getElementById('review_instr');
 if (element) {
 element.className = 'opened';
 }
 }
 var codereviews;
 function revsOnLoadHandler() {
 // register our source container with the commenting code
 var paths = {'svn3': '/trunk/FirePHP.php'}
 codereviews = CR_controller.setup(
 {"projectName": "yii-firephp", "loggedInUserEmail": "pawitVaap@gmail.com", "token": "ABZ6GAd6TWfeHDO-03mMd1OS0FHF394L6Q:1417666305055", "profileUrl": "/u/102963791977001767790/", "relativeBaseUrl": "", "assetVersionPath": "https://ssl.gstatic.com/codesite/ph/1729405847801014513", "domainName": null, "assetHostPath": "https://ssl.gstatic.com/codesite/ph", "projectHomeUrl": "/p/yii-firephp"}, '', 'svn3', paths,
 CR_BrowseIntegrationFactory);
 
 codereviews.registerActivityListener(CR_ActivityType.REVEAL_DRAFT_PLATE, showPublishInstructions);
 
 codereviews.registerActivityListener(CR_ActivityType.REVEAL_PUB_PLATE, pubRevealed);
 codereviews.registerActivityListener(CR_ActivityType.REVEAL_DRAFT_PLATE, draftRevealed);
 codereviews.registerActivityListener(CR_ActivityType.DISCARD_DRAFT_COMMENT, draftDestroyed);
 
 
 
 
 
 
 
 var initialized = true;
 reloadCursors();
 }
 window.onload = function() {keysOnLoadHandler(); revsOnLoadHandler();};

</script>
<script type="text/javascript" src="https://ssl.gstatic.com/codesite/ph/1729405847801014513/js/dit_scripts.js"></script>

 
 
 
 <script type="text/javascript" src="https://ssl.gstatic.com/codesite/ph/1729405847801014513/js/ph_core.js"></script>
 
 
 
 
</div> 

<div id="footer" dir="ltr">
 <div class="text">
 <a href="/projecthosting/terms.html">Terms</a> -
 <a href="http://www.google.com/privacy.html">Privacy</a> -
 <a href="/p/support/">Project Hosting Help</a>
 </div>
</div>
 <div class="hostedBy" style="margin-top: -20px;">
 <span style="vertical-align: top;">Powered by <a href="http://code.google.com/projecthosting/">Google Project Hosting</a></span>
 </div>

 
 


 
 </body>
</html>

