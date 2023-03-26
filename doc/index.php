<?php require("../functions/web_config.php");?>
<!DOCTYPE html>
<html lang="en"> 
  <head>
    <meta charset="utf-8">
    <meta content="IE=edge,chrome=1" http-equiv="X-UA-Compatible">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
        <meta name="description" content="Documentation">
    <title><?php echo $sitename; ?> - Documentation For Api Integration</title>

    <style media="screen">
      .highlight table td { padding: 5px; }
.highlight table pre { margin: 0; }
.highlight .gh {
  color: #999999;
}
.highlight .sr {
  color: #f6aa11;
}
.highlight .go {
  color: #888888;
}
.highlight .gp {
  color: #555555;
}
.highlight .gs {
}
.highlight .gu {
  color: #aaaaaa;
}
.highlight .nb {
  color: #f6aa11;
}
.highlight .cm {
  color: #75715e;
}
.highlight .cp {
  color: #75715e;
}
.highlight .c1 {
  color: #75715e;
}
.highlight .cs {
  color: #75715e;
}
.highlight .c, .highlight .ch, .highlight .cd, .highlight .cpf {
  color: #75715e;
}
.highlight .err {
  color: #960050;
}
.highlight .gr {
  color: #960050;
}
.highlight .gt {
  color: #960050;
}
.highlight .gd {
  color: #49483e;
}
.highlight .gi {
  color: #49483e;
}
.highlight .ge {
  color: #49483e;
}
.highlight .kc {
  color: #66d9ef;
}
.highlight .kd {
  color: #66d9ef;
}
.highlight .kr {
  color: #66d9ef;
}
.highlight .no {
  color: #66d9ef;
}
.highlight .kt {
  color: #66d9ef;
}
.highlight .mf {
  color: #ae81ff;
}
.highlight .mh {
  color: #ae81ff;
}
.highlight .il {
  color: #ae81ff;
}
.highlight .mi {
  color: #ae81ff;
}
.highlight .mo {
  color: #ae81ff;
}
.highlight .m, .highlight .mb, .highlight .mx {
  color: #ae81ff;
}
.highlight .sc {
  color: #ae81ff;
}
.highlight .se {
  color: #ae81ff;
}
.highlight .ss {
  color: #ae81ff;
}
.highlight .sd {
  color: #e6db74;
}
.highlight .s2 {
  color: #e6db74;
}
.highlight .sb {
  color: #e6db74;
}
.highlight .sh {
  color: #e6db74;
}
.highlight .si {
  color: #e6db74;
}
.highlight .sx {
  color: #e6db74;
}
.highlight .s1 {
  color: #e6db74;
}
.highlight .s, .highlight .sa, .highlight .dl {
  color: #e6db74;
}
.highlight .na {
  color: #a6e22e;
}
.highlight .nc {
  color: #a6e22e;
}
.highlight .nd {
  color: #a6e22e;
}
.highlight .ne {
  color: #a6e22e;
}
.highlight .nf, .highlight .fm {
  color: #a6e22e;
}
.highlight .vc {
  color: #ffffff;
}
.highlight .nn {
  color: #ffffff;
}
.highlight .ni {
  color: #ffffff;
}
.highlight .bp {
  color: #ffffff;
}
.highlight .vg {
  color: #ffffff;
}
.highlight .vi {
  color: #ffffff;
}
.highlight .nv, .highlight .vm {
  color: #ffffff;
}
.highlight .w {
  color: #ffffff;
}
.highlight {
  color: #ffffff;
}
.highlight .n, .highlight .py, .highlight .nx {
  color: #ffffff;
}
.highlight .nl {
  color: #f92672;
}
.highlight .ow {
  color: #f92672;
}
.highlight .nt {
  color: #f92672;
}
.highlight .k, .highlight .kv {
  color: #f92672;
}
.highlight .kn {
  color: #f92672;
}
.highlight .kp {
  color: #f92672;
}
.highlight .o {
  color: #f92672;
}
    </style>
    <style media="print">
      * {
        -webkit-transition:none!important;
        transition:none!important;
      }
      .highlight table td { padding: 5px; }
.highlight table pre { margin: 0; }
.highlight, .highlight .w {
  color: #586e75;
}
.highlight .err {
  color: #002b36;
  background-color: #dc322f;
}
.highlight .c, .highlight .ch, .highlight .cd, .highlight .cm, .highlight .cpf, .highlight .c1, .highlight .cs {
  color: #657b83;
}
.highlight .cp {
  color: #b58900;
}

.text-dangerx{
  color: red;
  font-weight: bold;
}
.highlight .nt {
  color: #b58900;
}
.highlight .o, .highlight .ow {
  color: #93a1a1;
}
.highlight .p, .highlight .pi {
  color: #93a1a1;
}
.highlight .gi {
  color: #859900;
}
.highlight .gd {
  color: #dc322f;
}
.highlight .gh {
  color: #268bd2;
  background-color: #002b36;
  font-weight: bold;
}
.highlight .k, .highlight .kn, .highlight .kp, .highlight .kr, .highlight .kv {
  color: #6c71c4;
}
.highlight .kc {
  color: #cb4b16;
}
.highlight .kt {
  color: #cb4b16;
}
.highlight .kd {
  color: #cb4b16;
}
.highlight .s, .highlight .sb, .highlight .sc, .highlight .dl, .highlight .sd, .highlight .s2, .highlight .sh, .highlight .sx, .highlight .s1 {
  color: #859900;
}
.highlight .sa {
  color: #6c71c4;
}
.highlight .sr {
  color: #2aa198;
}
.highlight .si {
  color: #d33682;
}
.highlight .se {
  color: #d33682;
}
.highlight .nn {
  color: #b58900;
}
.highlight .nc {
  color: #b58900;
}
.highlight .no {
  color: #b58900;
}
.highlight .na {
  color: #268bd2;
}
.highlight .m, .highlight .mb, .highlight .mf, .highlight .mh, .highlight .mi, .highlight .il, .highlight .mo, .highlight .mx {
  color: #859900;
}
.highlight .ss {
  color: #859900;
}
    </style>
    <link href="https://slatedocs.github.io/slate/stylesheets/screen-c9d8fa83.css" rel="stylesheet" media="screen" />
    <link href="https://slatedocs.github.io/slate/stylesheets/print-953e3353.css" rel="stylesheet" media="print" />
      <script src="https://slatedocs.github.io/slate/javascripts/all-b12a2749.js"></script>

    <script>
      $(function() { setupCodeCopy(); });
    </script>
  </head>

  <body class="index">
    <a href="#" id="nav-button">
      <span>
        NAV
        <img src="https://slatedocs.github.io/slate/images/navbar-cad8cdcb.png" alt="" />
      </span>
    </a>
    <div class="toc-wrapper">
      <img src="images/logo-1e815a84.png" class="logo" alt="" />

        <div class="search">
          <input type="text" class="search" id="input-search" placeholder="Search">
        </div>
        <ul class="search-results"></ul>
      <ul id="toc" class="toc-list-h1">
          <li>
            <a href="#introduction" class="toc-h1 toc-link" data-title="Introduction">Introduction</a>
          </li>

          <li>
          <a href="<?php echo $mainpage; ?>/doc/prices" class="toc-h1 toc-link" data-title="" target="_blank" style="color:yellow">OUR API PRICES</a>
          </li>

          <li>
            <a href="#authentication" class="toc-h1 toc-link" data-title="Authentication">Authentication</a>
          </li>

          <li>
            <a href="#check-bal" class="toc-h1 toc-link" data-title="">Check Balance</a>
          </li>
          <li>
            <a href="#airtime-int" class="toc-h1 toc-link" data-title="">Airtime Integration</a>
          </li>

          <li>
            <a href="#data-int" class="toc-h1 toc-link" data-title="">Data Integration</a>
          </li>

          <li>
            <a href="#cable-int" class="toc-h1 toc-link" data-title="">CableTV Integration</a>
          </li>

          <li>
            <a href="#bills-int" class="toc-h1 toc-link" data-title="">Electricity Integration</a>
          </li>

          <li>
            <a href="#exam-int" class="toc-h1 toc-link" data-title="">Exam Pin(s) Integration</a>
          </li>

          <li>
            <a href="#iuc-int" class="toc-h1 toc-link" data-title="">IUC No. Verification</a>
          </li>

          <li>
            <a href="#meter-int" class="toc-h1 toc-link" data-title="">Meter No. Verification</a>
          </li>
          <li>
            <a href="#errors" class="toc-h1 toc-link" data-title="Errors">Errors & Meaning</a>
          </li>
      </ul>
        <ul class="toc-footer">
            <li><a href='mailto:support@<?php echo $sitename; ?>.com'>Support & Technical Assistance</a></li>
            <li><a href='#'>Powered by <?php echo $sitename; ?></a></li>
        </ul>
    </div>
    <div class="page-wrapper">
      <div class="dark-box"></div>
      <div class="content">


<h1 id='introduction'>Introduction</h1>
<p>Welcome to the <span style="color: red;font-weight: bold;"><?php echo $sitename; ?></span> API! You can use our API to access <span style="color: red;font-weight: bold;"><?php echo $sitename; ?></span> API endpoints, which can be use to purchase any of our services, and breeds in our database.</p>

<p>We have language bindings in PHP, Ruby, Python, and JavaScript! You can use any programming language of your choice to connect to our endpoints.</p>

<p>This <?php echo $sitename; ?> API documentation page was created to assits you through the integration proccess.</p>
<p>Thanks.</p>



<!-- Auth Integration Start -->
<h1 id='authentication'>Authentication</h1>
<p>This endpoint retrieves users information.</p>
<h3 id='http-request'>HTTP Request</h3>
<p><code><span style="color: red;font-weight:bold;">POST</span> <?php echo $mainpage; ?>/api/details</code></p>
<h3 id='query-parameters'>Query Parameters</h3>
<table><thead>
<tr>
<th>Parameter</th>
<th>Default</th>
<th>Description</th>
</tr>
</thead><tbody>
<tr>
<td>token</td>
<td>true</td>
<td>This is the API-TOKEN generate on <?php echo $sitename; ?></td>
</tr>
<tr>
</tbody></table>
<h3 id='query-parameters'>Successful Response</h3>
<aside class="success">
{status:success, desc:Demo-Demo, balance:1000, account:earner}
</aside>
<!-- Auth Integration End -->


<!-- Bal Integration Start -->
<h1 id='check-bal'>Check User Balance</h1>
<p>This endpoint retrieves users account balance.</p>
<h3 id='http-request'>HTTP Request</h3>
<p><code><span style="color: red;font-weight:bold;">POST</span> <?php echo $mainpage; ?>/api/balance</code></p>
<h3 id='query-parameters'>Query Parameters</h3>
<table><thead>
<tr>
<th>Parameter</th>
<th>Default</th>
<th>Description</th>
</tr>
</thead><tbody>
<tr>
<td>token</td>
<td>true</td>
<td>This is the API-TOKEN generate on <?php echo $sitename; ?>.</td>
</tr>
<tr>
</tbody></table>
<h3 id='query-parameters'>Successful Response</h3>
<aside class="success">
{status:success, balance:1000}
</aside>
<!-- Bal Integration End -->


<!-- Airtime Integration Start -->

<h1 id='airtime-int'>Airtime Integration</h1>
<p>This endpoint purchase airtime from <?php echo $sitename; ?>.</p>
<h3 id='http-request'>HTTP Request</h3>
<p><code><span style="color: red;font-weight:bold;">POST</span> <?php echo $mainpage; ?>/api/airtime</code></p>
<h3 id='query-parameters'>Query Parameters</h3>
<table><thead>
<tr>
<th>Parameter</th>
<th>Default</th>
<th>Description</th>
</tr>
</thead><tbody>
<tr>
<td>token</td>
<td>true</td>
<td>This is the API-TOKEN generate on <?php echo $sitename; ?></td>
</tr>
<tr>
<td>mobile</td>
<td>true</td>
<td>This is the Mobile Number you are buying airtime on.</td>
</tr>
<tr>
<td>network</td>
<td>true</td>
<td>This is the network you are buying. e.g (MTN, GLO, AIRTEL, ETISALAT)</td>
</tr>
<tr>
<td>amount</td>
<td>true</td>
<td>This is the Amount you are buying</td>
</tr>
<tr>
<td>request_id</td>
<td>true</td>
<td>This is a unique reference generate for each transaction.</td>
</tr>
</tbody></table>

<h3 id='query-parameters'>Successful Response</h3>
<aside class="success">
{status:success, code:200, message:MTN-Airtime 200 Purchase Successfully On 08123xxxxxxx}
</aside>

<!-- Airtime Integration End -->




<!-- Data Integration Start -->

<h1 id='data-int'>Data Bundle Integration</h1>
<p>This endpoint purchase data bundle from <?php echo $sitename; ?>.</p>
<h3 id='http-request'>HTTP Request</h3>
<p><code><span style="color: red;font-weight:bold;">POST</span> <?php echo $mainpage; ?>/api/data</code></p>
<h3 id='query-parameters'>Query Parameters</h3>
<table><thead>
<tr>
<th>Parameter</th>
<th>Default</th>
<th>Description</th>
</tr>
</thead><tbody>
<tr>
<td>token</td>
<td>true</td>
<td>This is the API-TOKEN generate on <?php echo $sitename; ?>.</td>
</tr>
<tr>
<td>mobile</td>
<td>true</td>
<td>This is the Mobile Number you are buying data on.</td>
</tr>
<tr>
<td>network</td>
<td>true</td>
<td>This is the network you are buying. e.g (MTN, GLO, AIRTEL, ETISALAT, GIFTING)</td>
</tr>
<tr>
<td>plan_code</td>
<td>true</td>
<td>This is PLAN ID identifying your request. e.g (For MTN 1GB = plan_code => 1000) <a href="prices.php#dataprice" target="_blank">See More</a></td>
</tr>
<tr>
<td>request_id</td>
<td>true</td>
<td>This is a unique reference generate for each transaction.</td>
</tr>
</tbody></table>

<h3 id='query-parameters'>Successful Response</h3>
<aside class="success">
{status:success, code:200, desc:MTN 1GB Data Purchase Successfully On 08123xxxxxxx}
</aside>

<!-- Data Integration End -->

<!-- CableTv Integration Start -->

<h1 id='cable-int'>CableTV Integration</h1>
<p>This endpoint purchase cable-tv from <?php echo $sitename; ?>.</p>
<h3 id='http-request'>HTTP Request</h3>
<p><code><span style="color: red;font-weight:bold;">POST</span> <?php echo $mainpage; ?>/api/tv</code></p>
<h3 id='query-parameters'>Query Parameters</h3>
<table><thead>
<tr>
<th>Parameter</th>
<th>Default</th>
<th>Description</th>
</tr>
</thead><tbody>
<tr>
<td>token</td>
<td>true</td>
<td>This is the API-TOKEN generate on <?php echo $sitename; ?>.</td>
</tr>
<tr>
<td>service_id</td>
<td>true</td>
<td>This is the services you are paying for e.g dstv, gotv, startimes.</td>
</tr>
<tr>
<td>service_number</td>
<td>true</td>
<td>This is the Decoder No./IUC No. you are paying for.</td>
</tr>
<tr>
<td>plan_code</td>
<td>true</td>
<td>This is the plan code to identify cabletv package. <a href="prices.php#tvprice" target="_blank">See More...</a></td>
</tr>
<tr>
<td>request_id</td>
<td>true</td>
<td>This is a unique reference generate for each transaction.</td>
</tr>
</tbody></table>

<h3 id='query-parameters'>Successful Response</h3>
<aside class="success">
{code:200, status:success, desc:Gotv Jinja subscribe on 702354678}
</aside>

<!-- Cable Integration End -->


<!-- Bills Integration Start -->

<h1 id='bills-int'>Electricity Integration</h1>
<p>This endpoint purchase electricity token from <?php echo $sitename; ?>.</p>
<h3 id='http-request'>HTTP Request</h3>
<p><code><span style="color: red;font-weight:bold;">POST</span> <?php echo $mainpage; ?>/api/electricity</code></p>
<h3 id='query-parameters'>Query Parameters</h3>
<table><thead>
<tr>
<th>Parameter</th>
<th>Default</th>
<th>Description</th>
</tr>
</thead><tbody>
<tr>
<td>token</td>
<td>true</td>
<td>This is the API-TOKEN generate on <?php echo $sitename; ?>.</td>
</tr>
<tr>
<td>service_id</td>
<td>true</td>
<td>This is the services you are paying for e.g ekedc-electric, ibedc-electric. <a href="prices.php#electprice" target="_blank">See More...</a></td>
</tr>
<tr>
<td>service_number</td>
<td>true</td>
<td>This is the Meter No. you are paying for.</td>
</tr>
<tr>
<td>service_type</td>
<td>true</td>
<td>This is the type of electricity to purchase e.g postpaid, prepaid.</td>
</tr>
<tr>
<tr>
<td>amount</td>
<td>true</td>
<td>This is the amount of electricity you want to purchase.</td>
</tr>
<tr>
<td>request_id</td>
<td>true</td>
<td>This is a unique reference generate for each transaction.</td>
</tr>
</tbody></table>

<h3 id='query-parameters'>Successful Response</h3>
<aside class="success">
{code:200, status:success, desc:IBEDC Prepaid Bills Payment on 653782822, value:6547-8343-7343-2373-7343}
</aside>
<!-- Bills Integration End -->


<!-- IUC Verification Start -->
<h1 id='iuc-int'>IUC No. Verification</h1>
<p>This endpoint verify iuc number information.</p>
<h3 id='http-request'>HTTP Request</h3>
<p><code><span style="color: red;font-weight:bold;">POST</span> <?php echo $mainpage; ?>/api/verifyiuc</code></p>
<h3 id='query-parameters'>Query Parameters</h3>
<table><thead>
<tr>
<th>Parameter</th>
<th>Default</th>
<th>Description</th>
</tr>
</thead><tbody>
<tr>
<td>service_number</td>
<td>true</td>
<td>This is the Decoder No./IUC No. you are paying for.</td>
</tr>
<tr>
<td>service_id</td>
<td>true</td>
<td>This is the services you are paying for e.g dstv, gotv, startimes.</td>
</tr>
</tbody></table>

<h3 id='query-parameters'>Successful Response</h3>
<aside class="success">
{code:200, status:success, desc:ADELAKUN WILLIAMS}
</aside>
<!-- IUC Verification End -->


<!-- Meter Verification Start -->
<h1 id='meter-int'>Meter No. Verification</h1>
<p>This endpoint verify meter number information.</p>
<h3 id='http-request'>HTTP Request</h3>
<p><code><span style="color: red;font-weight:bold;">POST</span> <?php echo $mainpage; ?>/api/verifymeter</code></p>
<h3 id='query-parameters'>Query Parameters</h3>
<table><thead>
<tr>
<th>Parameter</th>
<th>Default</th>
<th>Description</th>
</tr>
</thead><tbody>
<tr>
<td>service_number</td>
<td>true</td>
<td>This is the Meter No. you are paying for.</td>
</tr>
<tr>
<td>service_id</td>
<td>true</td>
<td>This is the services you are paying for e.g eko-electric, ibadan-electric</td>
</tr>
<tr>
<td>service_type</td>
<td>true</td>
<td>This is the type of electricity to purchase e.g postpaid, prepaid.</td>
</tr>
</tbody></table>

<h3 id='query-parameters'>Successful Response</h3>
<aside class="success">
{code:200, status:success, desc:ADELAKUN WILLIAMS}
</aside>
<!-- Meter Verification End -->


<!-- Exam Integration Start -->

<h1 id='exam-int'>Exam Pins Integration</h1>
<p>This endpoint purchase education pins from <?php echo $sitename; ?>.</p>
<h3 id='http-request'>HTTP Request</h3>
<p><code><span style="color: red;font-weight:bold;">POST</span> <?php echo $mainpage; ?>/api/education</code></p>
<h3 id='query-parameters'>Query Parameters</h3>
<table><thead>
<tr>
<th>Parameter</th>
<th>Default</th>
<th>Description</th>
</tr>
</thead><tbody>
<tr>
<td>token</td>
<td>true</td>
<td>This is the API-TOKEN generate on <?php echo $sitename; ?>.</td>
</tr>
<tr>
<td>service_id</td>
<td>true</td>
<td>This is the services you are paying for e.g waec, neco, nabteb.</td>
</tr>
<tr>
<td>request_id</td>
<td>true</td>
<td>This is a unique reference generate for each transaction.</td>
</tr>
</tbody></table>

<h3 id='query-parameters'>Successful Response</h3>
<aside class="success">
{code:200, status:success, desc:Waec PIN purchase successfully, pin:78348094003403}
</aside>
<!-- Exam Integration End -->


<!-- Error Doc Start -->
<h1 id='errors'>Errors & Meaning</h1>

<p>The <?php echo $sitename; ?> API uses the following error codes:</p>

<table><thead>
<tr>
<th>Error Code</th>
<th>Meaning</th>
</tr>
</thead><tbody>
<tr>
<td>200</td>
<td>Successful -- Successful API transaction.</td>
</tr>
<tr>
<td>300</td>
<td>Unauthorized -- Fail retreiving user account.</td>
</tr>
<tr>
<td>500</td>
<td>Imcomplete -- Imcomplete api parameters.</td>
</tr>
<tr>
<td>700</td>
<td>Invalid Plan -- Invalid plan code.</td>
</tr>
<tr>
<td>800</td>
<td>Insufficient -- Low account or wallet.</td>
</tr>
<tr>
<td>900</td>
<td>Unsuccessful -- Fail API transaction.</td>
</tr>
<tr>
</tbody></table>

<!-- Error Doc End -->


      </div>

    </div>
  </body>
</html>
