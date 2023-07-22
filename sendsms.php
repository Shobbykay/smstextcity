
<html>
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0, minimal-ui">
    <meta name="description" content="FundRealEstate">
    <meta name="keywords" content="FundRealEstate, FundRealEstate Management">
    <meta name="author" content="Kayode Shobalaje">
    <title>Dashboard</title>

    <link rel="apple-touch-icon" href="src/assets/img/smstextcity_logo.png">
    <link rel="shortcut icon" type="image/png" href="src/assets/img/smstextcity_logo.png"> 

    <!-- BEGIN VENDOR CSS-->
    <link rel="stylesheet" type="text/css" href="src/assets/css/bootstrap.min.css">
    <!-- <link rel="stylesheet" type="text/css" href="src/assets/css/vendors.min.css"> -->
    <!-- <link rel="stylesheet" type="text/css" href="assets/css/animate.css">-->
    <link rel="stylesheet" type="text/css" href="src/assets/css/balloon.css">
    <link rel="stylesheet" type="text/css" href="src/assets/css/dashboard.css">
    
    <link rel="stylesheet" type="text/css" href="src/assets/fonts/css/line-awesome.min.css">

</head>
<body>
    <div class="header">
        <div class="d-flex justify-content-between">
            <div class="p-2">
            <img src="src/assets/img/smstextcity_logo.png" class="logo_" alt="logo"></div>
            <div class="p-2">
            <ul class="navb">
              <li class="">
                <a class="nav-link_" href="dashboard.php">Home</a>
              </li>
              <li class="">
                <a class="nav-link_ active" href="#">Send SMS</a>
              </li>
              <li class="">
                <a class="nav-link_" href="#">Create SMS Group</a>
              </li>
              <li class="">
                <a class="nav-link_" href="#">Delivery Report</a>
              </li>
            </ul>
            </div>
            <div class="p-2">&nbsp;</div>
            <div class="p-2">
                <img src="src/assets/img/avt.png" class="avt_" alt="Avatar">&nbsp;&nbsp;
                <strong data-balloon="Welcome to SMSTextCity" data-balloon-pos="down" data-balloon-visible>Kayode Shobalaje</strong> &nbsp;&nbsp;&nbsp;&nbsp;
                <a href="signout.php" class="btn btn-info btn-rounded btn-sm text-white"><small>Sign Out</small></a>
            </div>
        </div>
    </div>

    <div class="left-sidebar">
        <strong><small>MENU</small></strong>
        <ul>
            <li><a href="dashboard.php" class=""><i class="la la-dashboard la-xl"></i>Dashboard</a></li>
            <li><a href="smslog.php" class="active"><i class="la la-envelope la-xl"></i>SMS Logs</a></li>
            <li><a href="#" class=""><i class="la la-user-secret la-xl"></i>Contact List</a></li>
            <li><a href="#" class=""><i class="la la-briefcase la-xl"></i>Bulk Numbers</a></li>
            <li><a href="#" class=""><i class="la la-arrow-up la-xl"></i>Upload Bulk Numbers</a></li>
            <li><a href="#" class=""><i class="la la-sticky-note la-xl"></i>Instructions</a></li>
            <li><a href="#" class=""><i class="la la-flag la-xl"></i>Delivery Report</a></li>
            <li><a href="#" class=""><i class="la la-cog la-xl"></i>Settings</a></li>
        </ul>
    </div>

    <div class="container">
        <h1>Compose &amp; Send SMS</h1>
        <small>Send sms to single or several contacts</small>

        <div class="row mt-2">
            <div class="col-md-4">
                <div class="card">
                    <div class="card-body">
                        <div class="d-flex justify-content-between">
                            <div><h6 class="upper vgh">Contact List</h6></div>
                            <div><a href="#" class="small-btn">Add Contact</a></div>
                        </div>
                        <input type="text" placeholder="Search Contact" class="form-control search mt-05">
                        <ul class="list-group list-group-flush">
                            <li class="list-group-item"><label for="1"><input type="checkbox"> Kayode Shobalaje</label></li>
                            <li class="list-group-item"><label for="1"><input type="checkbox"> Tinubu Oluwaloni</label></li>
                            <li class="list-group-item"><label for="1"><input type="checkbox"> Old Boys Association.. <span class="badge badge-info">1,290</span></label></li>
                            <li class="list-group-item"><label for="1"><input type="checkbox"> Nigerian Youths <span class="badge badge-info">10,290</span></label></li>
                            <li class="list-group-item"><label for="1"><input type="checkbox"> Tinubu Oluwaloni</label></li>
                            <li class="list-group-item"><label for="1"><input type="checkbox"> Tinubu Oluwaloni</label></li>
                            <li class="list-group-item"><label for="1"><input type="checkbox"> Tinubu Oluwaloni</label></li>
                            <li class="list-group-item"><label for="1"><input type="checkbox"> Tinubu Oluwaloni</label></li>
                        </ul>
                    </div>
                </div>
            </div>
            <div class="col-md-8">
                <div class="row">
                    <div class="col-md-6">
                        <label for="">From: [your sender name]</label>
                        <input type="text" class="form-control smdj" placeholder="sender's name">
                    </div>
                    <div class="col-md-6">
                    <label for="">Country</label>
                    <select name="data[Message][country_id]" class="form-control smdj" tabindex="20" id="MessageCountryId" required="required">
                            <option value="1">Afghanistan [93]</option>
                            <option value="2">Albania [355]</option>
                            <option value="3">Algeria [213]</option>
                            <option value="4">American Samoa [1684]</option>
                            <option value="5">Andorra [376]</option>
                            <option value="6">Angola [244]</option>
                            <option value="7">Anguilla [1264]</option>
                            <option value="8">Antarctica [672]</option>
                            <option value="9">Antigua [1268]</option>
                            <option value="10">Argentina [54]</option>
                            <option value="11">Armenia [374]</option>
                            <option value="12">Aruba [297]</option>
                            <option value="13">Ascension [247]</option>
                            <option value="14">Australia [61]</option>
                            <option value="15">Australian External Territories [672]</option>
                            <option value="16">Austria [43]</option>
                            <option value="17">Azerbaijan [994]</option>
                            <option value="18">Bahamas [1242]</option>
                            <option value="19">Bahrain [973]</option>
                            <option value="20">Bangladesh [880]</option>
                            <option value="21">Barbados [1246]</option>
                            <option value="22">Barbuda [1268]</option>
                            <option value="23">Belarus [375]</option>
                            <option value="24">Belgium [32]</option>
                            <option value="25">Belize [501]</option>
                            <option value="26">Benin [229]</option>
                            <option value="27">Bermuda [1441]</option>
                            <option value="28">Bhutan [975]</option>
                            <option value="29">Bolivia [591]</option>
                            <option value="30">Bosnia &amp; Herzegovina [387]</option>
                            <option value="31">Botswana [267]</option>
                            <option value="32">Brazil [55]</option>
                            <option value="33">British Virgin Islands [1284]</option>
                            <option value="34">Brunei Darussalam [673]</option>
                            <option value="35">Bulgaria [359]</option>
                            <option value="36">Burkina Faso [226]</option>
                            <option value="37">Burundi [257]</option>
                            <option value="38">Cambodia [855]</option>
                            <option value="39">Cameroon [237]</option>
                            <option value="40">Canada [1]</option>
                            <option value="41">Cape Verde Islands [238]</option>
                            <option value="42">Cayman Islands [1345]</option>
                            <option value="43">Central African Republic [236]</option>
                            <option value="44">Chad [235]</option>
                            <option value="45">Chatham Island (New Zealand) [64]</option>
                            <option value="46">Chile [56]</option>
                            <option value="47">China (PRC) [86]</option>
                            <option value="48">Christmas Island [61]</option>
                            <option value="49">CocosKeeling Islands [61]</option>
                            <option value="50">Colombia [57]</option>
                            <option value="51">Comoros [269]</option>
                            <option value="52">Congo [242]</option>
                            <option value="53">Congo, Dem. Rep. of (Zaire) [243]</option>
                            <option value="54">Cook Islands [682]</option>
                            <option value="55">Costa Rica [506]</option>
                            <option value="56">Cote d'Ivoire (Ivory Coast) [225]</option>
                            <option value="57">Croatia [385]</option>
                            <option value="58">Cuba [53]</option>
                            <option value="59">Cuba (Guantanamo Bay) [5399]</option>
                            <option value="60">Curacao [599]</option>
                            <option value="61">Cyprus [357]</option>
                            <option value="62">Czech Republic [420]</option>
                            <option value="63">Denmark [45]</option>
                            <option value="64">Diego Garcia [246]</option>
                            <option value="65">Djibouti [253]</option>
                            <option value="66">Dominica [1767]</option>
                            <option value="67">Dominican Republic [1809]</option>
                            <option value="68">East Timor [670]</option>
                            <option value="69">Easter Island [56]</option>
                            <option value="70">Ecuador [593]</option>
                            <option value="71">Egypt [20]</option>
                            <option value="72">El Salvador [503]</option>
                            <option value="73">Ellipso (Mobile Satellite service) [17625]</option>
                            <option value="74">EMSAT (Mobile Satellite service) [88213]</option>
                            <option value="75">Equatorial Guinea [240]</option>
                            <option value="76">Eritrea [291]</option>
                            <option value="77">Estonia [372]</option>
                            <option value="78">Ethiopia [251]</option>
                            <option value="79">Falkland Islands (Malvinas) [500]</option>
                            <option value="80">Faroe Islands [298]</option>
                            <option value="81">Fiji Islands [679]</option>
                            <option value="82">Finland [358]</option>
                            <option value="83">France [33]</option>
                            <option value="84">French Antilles [596]</option>
                            <option value="85">French Guiana [594]</option>
                            <option value="86">French Polynesia [689]</option>
                            <option value="87">Gabonese Republic [241]</option>
                            <option value="88">Gambia [220]</option>
                            <option value="89">Georgia [995]</option>
                            <option value="90">Germany [49]</option>
                            <option value="91">Ghana [233]</option>
                            <option value="92">Gibraltar [350]</option>
                            <option value="93">Global Mobile Satellite System (GMSS) [881]</option>
                            <option value="94">Globalstar [8818]</option>
                            <option value="95">Globalstar (Mobile Satellite Service) [17637]</option>
                            <option value="96">Greece [30]</option>
                            <option value="97">Greenland [299]</option>
                            <option value="98">Grenada [1473]</option>
                            <option value="99">Guadeloupe [590]</option>
                            <option value="100">Guam [1671]</option>
                            <option value="101">Guantanamo Bay [5399]</option>
                            <option value="102">Guatemala [502]</option>
                            <option value="104">Guinea [224]</option>
                            <option value="103">GuineaBissau [245]</option>
                            <option value="105">Guyana [592]</option>
                            <option value="106">Haiti [509]</option>
                            <option value="107">Honduras [504]</option>
                            <option value="108">Hong Kong [852]</option>
                            <option value="109">Hungary [36]</option>
                            <option value="111">Iceland [354]</option>
                            <option value="110">ICO Global (Mobile Satellite Service) [17621]</option>
                            <option value="112">India [91]</option>
                            <option value="113">Indonesia [62]</option>
                            <option value="114">Inmarsat (Atlantic Ocean  East) [871]</option>
                            <option value="115">Inmarsat (Atlantic Ocean  West) [874]</option>
                            <option value="116">Inmarsat (Indian Ocean) [873]</option>
                            <option value="117">Inmarsat (Pacific Ocean) [872]</option>
                            <option value="118">International Freephone Service [800]</option>
                            <option value="119">Intl. Shared Cost Service (ISCS) [808]</option>
                            <option value="120">Iran [98]</option>
                            <option value="121">Iraq [964]</option>
                            <option value="122">Ireland [353]</option>
                            <option value="123">Iridium (Mobile Satellite service) [17633]</option>
                            <option value="124">Israel [972]</option>
                            <option value="125">Italy [39]</option>
                            <option value="126">Jamaica [1876]</option>
                            <option value="127">Japan [81]</option>
                            <option value="128">Jordan [962]</option>
                            <option value="129">Kazakhstan [7]</option>
                            <option value="130">Kenya [254]</option>
                            <option value="131">Kiribati [686]</option>
                            <option value="132">Korea (North) [850]</option>
                            <option value="133">Korea (South) [82]</option>
                            <option value="134">Kosovo [383]</option>
                            <option value="135">Kuwait [965]</option>
                            <option value="136">Kyrgyz Republic [996]</option>
                            <option value="137">Laos [856]</option>
                            <option value="138">Latvia [371]</option>
                            <option value="139">Lebanon [961]</option>
                            <option value="140">Lesotho [266]</option>
                            <option value="141">Liberia [231]</option>
                            <option value="142">Libya [218]</option>
                            <option value="143">Liechtenstein [423]</option>
                            <option value="144">Lithuania [370]</option>
                            <option value="145">Luxembourg [352]</option>
                            <option value="146">Macao [853]</option>
                            <option value="147">Macedonia (Former Yugoslav Rep of.) [389]</option>
                            <option value="148">Madagascar [261]</option>
                            <option value="149">Malawi [265]</option>
                            <option value="150">Malaysia [60]</option>
                            <option value="151">Maldives [960]</option>
                            <option value="152">Mali Republic [223]</option>
                            <option value="153">Malta [356]</option>
                            <option value="154">Marshall Islands [692]</option>
                            <option value="155">Martinique [596]</option>
                            <option value="156">Mauritania [222]</option>
                            <option value="157">Mauritius [230]</option>
                            <option value="158">Mayotte Island [269]</option>
                            <option value="159">Mexico [52]</option>
                            <option value="160">Micronesia [691]</option>
                            <option value="161">Midway Island [1808]</option>
                            <option value="162">Moldova [373]</option>
                            <option value="163">Monaco [377]</option>
                            <option value="164">Mongolia [976]</option>
                            <option value="165">Montenegro [382]</option>
                            <option value="166">Montserrat [1664]</option>
                            <option value="167">Morocco [212]</option>
                            <option value="168">Mozambique [258]</option>
                            <option value="169">Myanmar [95]</option>
                            <option value="170">Namibia [264]</option>
                            <option value="171">Nauru [674]</option>
                            <option value="172">Nepal [977]</option>
                            <option value="173">Netherlands [31]</option>
                            <option value="174">Netherlands Antilles [599]</option>
                            <option value="175">Nevis [1869]</option>
                            <option value="176">New Caledonia [687]</option>
                            <option value="177">New Zealand [64]</option>
                            <option value="178">Nicaragua [505]</option>
                            <option value="179">Niger [227]</option>
                            <option value="180" selected="selected">Nigeria [234]</option>
                            <option value="181">Niue [683]</option>
                            <option value="182">Norfolk Island [672]</option>
                            <option value="183">Northern Marianas Islands [1670]</option>
                            <option value="184">Norway [47]</option>
                            <option value="185">Oman [968]</option>
                            <option value="186">Pakistan [92]</option>
                            <option value="187">Palau [680]</option>
                            <option value="263">Palestine [970]</option>
                            <option value="188">Palestinian Settlements [970]</option>
                            <option value="189">Panama [507]</option>
                            <option value="190">Papua New Guinea [675]</option>
                            <option value="191">Paraguay [595]</option>
                            <option value="192">Peru [51]</option>
                            <option value="193">Philippines [63]</option>
                            <option value="194">Poland [48]</option>
                            <option value="195">Portugal [351]</option>
                            <option value="196">Puerto Rico [1787]</option>
                            <option value="197">Qatar [974]</option>
                            <option value="198">Reunion Island [262]</option>
                            <option value="199">Romania [40]</option>
                            <option value="200">Russia [7]</option>
                            <option value="201">Rwanda [250]</option>
                            <option value="207">Samoa [685]</option>
                            <option value="208">San Marino [378]</option>
                            <option value="209">Sao Tome and Principe [239]</option>
                            <option value="210">Saudi Arabia [966]</option>
                            <option value="211">Senegal [221]</option>
                            <option value="212">Serbia [381]</option>
                            <option value="213">Seychelles Republic [248]</option>
                            <option value="214">Sierra Leone [232]</option>
                            <option value="215">Singapore [65]</option>
                            <option value="216">Slovak Republic [421]</option>
                            <option value="217">Slovenia [386]</option>
                            <option value="218">Solomon Islands [677]</option>
                            <option value="219">Somali Democratic Republic [252]</option>
                            <option value="220">South Africa [27]</option>
                            <option value="221">Spain [34]</option>
                            <option value="222">Sri Lanka [94]</option>
                            <option value="202">St. Helena [290]</option>
                            <option value="203">St. Kitts/Nevis [1869]</option>
                            <option value="204">St. Lucia [1758]</option>
                            <option value="205">St. Pierre &amp; Miquelon [508]</option>
                            <option value="206">St. Vincent &amp; Grenadines [1784]</option>
                            <option value="223">Sudan [249]</option>
                            <option value="224">Suriname [597]</option>
                            <option value="225">Swaziland [268]</option>
                            <option value="226">Sweden [46]</option>
                            <option value="227">Switzerland [41]</option>
                            <option value="228">Syria [963]</option>
                            <option value="229">Taiwan [886]</option>
                            <option value="230">Tajikistan [992]</option>
                            <option value="231">Tanzania [255]</option>
                            <option value="232">Thailand [66]</option>
                            <option value="233">Thuraya (Mobile Satellite service) [88216]</option>
                            <option value="234">Timor Leste [670]</option>
                            <option value="235">Togo [228]</option>
                            <option value="236">Tokelau [690]</option>
                            <option value="237">Tonga Islands [676]</option>
                            <option value="238">Trinidad &amp; Tobago [1868]</option>
                            <option value="239">Tunisia [216]</option>
                            <option value="240">Turkey [90]</option>
                            <option value="241">Turkmenistan [993]</option>
                            <option value="242">Turks and Caicos Islands [1649]</option>
                            <option value="243">Tuvalu [688]</option>
                            <option value="244">Uganda [256]</option>
                            <option value="245">Ukraine [380]</option>
                            <option value="246">United Arab Emirates [971]</option>
                            <option value="247">United Kingdom [44]</option>
                            <option value="248">United States of America [1]</option>
                            <option value="250">Universal Personal Telecomms (UPT) [878]</option>
                            <option value="251">Uruguay [598]</option>
                            <option value="249">US Virgin Islands [1340]</option>
                            <option value="252">Uzbekistan [998]</option>
                            <option value="253">Vanuatu [678]</option>
                            <option value="254">Vatican City [39]</option>
                            <option value="255">Venezuela [58]</option>
                            <option value="256">Vietnam [84]</option>
                            <option value="257">Wake Island [808]</option>
                            <option value="258">Wallis and Futuna Islands [681]</option>
                            <option value="259">Yemen [967]</option>
                            <option value="260">Zambia [260]</option>
                            <option value="261">Zanzibar [255]</option>
                            <option value="262">Zimbabwe [263]</option>
                        </select>
                    </div>
                </div>

                <div class="row mt-2">
                    <div class="col-md-12">
                        <label for="">Recipients' phone numbers. Enter 080...,080... or 23480... Just comma, No spaces!.</label>
                        <input type="text" class="form-control smdj" placeholder="sender's name">
                    </div>
                </div>

                <div class="row mt-2">
                    <div class="col-md-12">
                        <div class="d-flex justify-content-between">
                            <div><label for="">Message</label></div>
                            <div><small>Page Count: 1 (0/160) used</small></div>
                        </div>
                        <div class="clearfix"></div>
                        <div class="d-block">
                            <textarea name="" id="" class="form-contol smdj"></textarea>
                        </div>
                    </div>
                </div>

                <div class="mt-2">
                    <label class="radio boldtext" for="MessageSendtype1">
                        <input type="radio" name="data[Message][sendtype]" id="MessageSendtype1" value="1" checked="checked"> Send now
                    </label>
                    <div class="clearfix"></div>
                    <label class="radio" for="MessageSendtype2">
                        <input type="radio" name="data[Message][sendtype]" id="MessageSendtype2" value="2"> Schedule (Auto-send later)
                    </label>
                </div>

                <div class="mt-2">
                    <div class="d-flex justify-content-between">
                        <div>
                            <button class="btn btn-info btn-rounded" type="submit">Send SMS</button>
                        </div>
                        <div>
                            <button class="btn btn-secondary btn-rounded">Save as Draft</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

</body>
</html>