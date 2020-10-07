<title>Wizard</title>
<link rel="stylesheet" href="<?= base_url('assets/css/pages/wizard/wizard-1.min.css') ?>">

	<div class="d-flex flex-column-fluid">
	    <!--begin::Container-->
	    <div class=" container ">
	        <div class="card card-custom">
	            <div class="card-body p-0">
	                <!--begin::Wizard-->
	                <div class="wizard wizard-1" id="kt_wizard_v1" data-wizard-state="step-first"
	                    data-wizard-clickable="false">
	                    <!--begin::Wizard Nav-->
	                    <div class="wizard-nav border-bottom">
	                        <div class="wizard-steps p-8 p-lg-10">
	                            <!--begin::Wizard Step 1 Nav-->
	                            <div class="wizard-step" data-wizard-type="step" data-wizard-state="current">
	                                <div class="wizard-label">
	                                    <i class="wizard-icon flaticon-bus-stop"></i>
	                                    <h3 class="wizard-title">1. NIK Pemohon</h3>
	                                </div>
	                                <span class="svg-icon svg-icon-xl wizard-arrow">
	                                    <!--begin::Svg Icon | path:assets/media/svg/icons/Navigation/Arrow-right.svg--><svg
	                                        xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink"
	                                        width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
	                                        <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
	                                            <polygon points="0 0 24 0 24 24 0 24" />
	                                            <rect fill="#000000" opacity="0.3"
	                                                transform="translate(12.000000, 12.000000) rotate(-90.000000) translate(-12.000000, -12.000000) "
	                                                x="11" y="5" width="2" height="14" rx="1" />
	                                            <path
	                                                d="M9.70710318,15.7071045 C9.31657888,16.0976288 8.68341391,16.0976288 8.29288961,15.7071045 C7.90236532,15.3165802 7.90236532,14.6834152 8.29288961,14.2928909 L14.2928896,8.29289093 C14.6714686,7.914312 15.281055,7.90106637 15.675721,8.26284357 L21.675721,13.7628436 C22.08284,14.136036 22.1103429,14.7686034 21.7371505,15.1757223 C21.3639581,15.5828413 20.7313908,15.6103443 20.3242718,15.2371519 L15.0300721,10.3841355 L9.70710318,15.7071045 Z"
	                                                fill="#000000" fill-rule="nonzero"
	                                                transform="translate(14.999999, 11.999997) scale(1, -1) rotate(90.000000) translate(-14.999999, -11.999997) " />
	                                        </g>
	                                    </svg>
	                                    <!--end::Svg Icon--></span>
	                            </div>
	                            <!--end::Wizard Step 1 Nav-->

	                            <!--begin::Wizard Step 2 Nav-->
	                            <div class="wizard-step" data-wizard-type="step">
	                                <div class="wizard-label">
	                                    <i class="wizard-icon flaticon-list"></i>
	                                    <h3 class="wizard-title">2. Pilih Jenis Layanan</h3>
	                                </div>
	                                <span class="svg-icon svg-icon-xl wizard-arrow last">
	                                    <!--begin::Svg Icon | path:assets/media/svg/icons/Navigation/Arrow-right.svg--><svg
	                                        xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink"
	                                        width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
	                                        <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
	                                            <polygon points="0 0 24 0 24 24 0 24" />
	                                            <rect fill="#000000" opacity="0.3"
	                                                transform="translate(12.000000, 12.000000) rotate(-90.000000) translate(-12.000000, -12.000000) "
	                                                x="11" y="5" width="2" height="14" rx="1" />
	                                            <path
	                                                d="M9.70710318,15.7071045 C9.31657888,16.0976288 8.68341391,16.0976288 8.29288961,15.7071045 C7.90236532,15.3165802 7.90236532,14.6834152 8.29288961,14.2928909 L14.2928896,8.29289093 C14.6714686,7.914312 15.281055,7.90106637 15.675721,8.26284357 L21.675721,13.7628436 C22.08284,14.136036 22.1103429,14.7686034 21.7371505,15.1757223 C21.3639581,15.5828413 20.7313908,15.6103443 20.3242718,15.2371519 L15.0300721,10.3841355 L9.70710318,15.7071045 Z"
	                                                fill="#000000" fill-rule="nonzero"
	                                                transform="translate(14.999999, 11.999997) scale(1, -1) rotate(90.000000) translate(-14.999999, -11.999997) " />
	                                        </g>
	                                    </svg>
	                                    <!--end::Svg Icon--></span>
	                            </div>
	                            <!--end::Wizard Step 2 Nav-->
	                        </div>
	                    </div>
	                    <!--end::Wizard Nav-->

	                    <!--begin::Wizard Body-->
	                    <div class="row justify-content-center my-10 px-8 my-lg-15 px-lg-10">
	                        <div class="col-xl-12 col-xxl-7">
	                            <!--begin::Wizard Form-->
	                            <form class="form" id="kt_form">
	                                <!--begin::Wizard Step 1-->
	                                <div class="pb-5" data-wizard-type="step-content" data-wizard-state="current">
	                                    <h3 class="mb-10 font-weight-bold text-dark">Setup Your Current Location</h3>
	                                    <!--begin::Input-->
	                                    <div class="form-group">
	                                        <label>Address Line 1</label>
	                                        <input type="text" class="form-control form-control-solid form-control-lg"
	                                            name="address1" placeholder="Address Line 1" value="Address Line 1" />
	                                        <span class="form-text text-muted">Please enter your Address.</span>
	                                    </div>
	                                    <!--end::Input-->

	                                    <!--begin::Input-->
	                                    <div class="form-group">
	                                        <label>Address Line 2</label>
	                                        <input type="text" class="form-control form-control-solid form-control-lg"
	                                            name="address2" placeholder="Address Line 2" value="Address Line 2" />
	                                        <span class="form-text text-muted">Please enter your Address.</span>
	                                    </div>
	                                    <!--end::Input-->
	                                    <div class="row">
	                                        <div class="col-xl-6">
	                                            <!--begin::Input-->
	                                            <div class="form-group">
	                                                <label>Postcode</label>
	                                                <input type="text"
	                                                    class="form-control form-control-solid form-control-lg"
	                                                    name="postcode" placeholder="Postcode" value="3000" />
	                                                <span class="form-text text-muted">Please enter your Postcode.</span>
	                                            </div>
	                                            <!--end::Input-->
	                                        </div>
	                                        <div class="col-xl-6">
	                                            <!--begin::Input-->
	                                            <div class="form-group">
	                                                <label>City</label>
	                                                <input type="text"
	                                                    class="form-control form-control-solid form-control-lg" name="city"
	                                                    placeholder="City" value="Melbourne" />
	                                                <span class="form-text text-muted">Please enter your City.</span>
	                                            </div>
	                                            <!--end::Input-->
	                                        </div>
	                                    </div>
	                                    <div class="row">
	                                        <div class="col-xl-6">
	                                            <!--begin::Input-->
	                                            <div class="form-group">
	                                                <label>State</label>
	                                                <input type="text"
	                                                    class="form-control form-control-solid form-control-lg"
	                                                    name="state" placeholder="State" value="VIC" />
	                                                <span class="form-text text-muted">Please enter your State.</span>
	                                            </div>
	                                            <!--end::Input-->
	                                        </div>
	                                        <div class="col-xl-6">
	                                            <!--begin::Select-->
	                                            <div class="form-group">
	                                                <label>Country</label>
	                                                <select name="country"
	                                                    class="form-control form-control-solid form-control-lg">
	                                                    <option value="">Select</option>
	                                                    <option value="AF">Afghanistan</option>
	                                                    <option value="AX">Åland Islands</option>
	                                                    <option value="AL">Albania</option>
	                                                    <option value="DZ">Algeria</option>
	                                                    <option value="AS">American Samoa</option>
	                                                    <option value="AD">Andorra</option>
	                                                    <option value="AO">Angola</option>
	                                                    <option value="AI">Anguilla</option>
	                                                    <option value="AQ">Antarctica</option>
	                                                    <option value="AG">Antigua and Barbuda</option>
	                                                    <option value="AR">Argentina</option>
	                                                    <option value="AM">Armenia</option>
	                                                    <option value="AW">Aruba</option>
	                                                    <option value="AU" selected>Australia</option>
	                                                    <option value="AT">Austria</option>
	                                                    <option value="AZ">Azerbaijan</option>
	                                                    <option value="BS">Bahamas</option>
	                                                    <option value="BH">Bahrain</option>
	                                                    <option value="BD">Bangladesh</option>
	                                                    <option value="BB">Barbados</option>
	                                                    <option value="BY">Belarus</option>
	                                                    <option value="BE">Belgium</option>
	                                                    <option value="BZ">Belize</option>
	                                                    <option value="BJ">Benin</option>
	                                                    <option value="BM">Bermuda</option>
	                                                    <option value="BT">Bhutan</option>
	                                                    <option value="BO">Bolivia, Plurinational State of</option>
	                                                    <option value="BQ">Bonaire, Sint Eustatius and Saba</option>
	                                                    <option value="BA">Bosnia and Herzegovina</option>
	                                                    <option value="BW">Botswana</option>
	                                                    <option value="BV">Bouvet Island</option>
	                                                    <option value="BR">Brazil</option>
	                                                    <option value="IO">British Indian Ocean Territory</option>
	                                                    <option value="BN">Brunei Darussalam</option>
	                                                    <option value="BG">Bulgaria</option>
	                                                    <option value="BF">Burkina Faso</option>
	                                                    <option value="BI">Burundi</option>
	                                                    <option value="KH">Cambodia</option>
	                                                    <option value="CM">Cameroon</option>
	                                                    <option value="CA">Canada</option>
	                                                    <option value="CV">Cape Verde</option>
	                                                    <option value="KY">Cayman Islands</option>
	                                                    <option value="CF">Central African Republic</option>
	                                                    <option value="TD">Chad</option>
	                                                    <option value="CL">Chile</option>
	                                                    <option value="CN">China</option>
	                                                    <option value="CX">Christmas Island</option>
	                                                    <option value="CC">Cocos (Keeling) Islands</option>
	                                                    <option value="CO">Colombia</option>
	                                                    <option value="KM">Comoros</option>
	                                                    <option value="CG">Congo</option>
	                                                    <option value="CD">Congo, the Democratic Republic of the</option>
	                                                    <option value="CK">Cook Islands</option>
	                                                    <option value="CR">Costa Rica</option>
	                                                    <option value="CI">Côte d'Ivoire</option>
	                                                    <option value="HR">Croatia</option>
	                                                    <option value="CU">Cuba</option>
	                                                    <option value="CW">Curaçao</option>
	                                                    <option value="CY">Cyprus</option>
	                                                    <option value="CZ">Czech Republic</option>
	                                                    <option value="DK">Denmark</option>
	                                                    <option value="DJ">Djibouti</option>
	                                                    <option value="DM">Dominica</option>
	                                                    <option value="DO">Dominican Republic</option>
	                                                    <option value="EC">Ecuador</option>
	                                                    <option value="EG">Egypt</option>
	                                                    <option value="SV">El Salvador</option>
	                                                    <option value="GQ">Equatorial Guinea</option>
	                                                    <option value="ER">Eritrea</option>
	                                                    <option value="EE">Estonia</option>
	                                                    <option value="ET">Ethiopia</option>
	                                                    <option value="FK">Falkland Islands (Malvinas)</option>
	                                                    <option value="FO">Faroe Islands</option>
	                                                    <option value="FJ">Fiji</option>
	                                                    <option value="FI">Finland</option>
	                                                    <option value="FR">France</option>
	                                                    <option value="GF">French Guiana</option>
	                                                    <option value="PF">French Polynesia</option>
	                                                    <option value="TF">French Southern Territories</option>
	                                                    <option value="GA">Gabon</option>
	                                                    <option value="GM">Gambia</option>
	                                                    <option value="GE">Georgia</option>
	                                                    <option value="DE">Germany</option>
	                                                    <option value="GH">Ghana</option>
	                                                    <option value="GI">Gibraltar</option>
	                                                    <option value="GR">Greece</option>
	                                                    <option value="GL">Greenland</option>
	                                                    <option value="GD">Grenada</option>
	                                                    <option value="GP">Guadeloupe</option>
	                                                    <option value="GU">Guam</option>
	                                                    <option value="GT">Guatemala</option>
	                                                    <option value="GG">Guernsey</option>
	                                                    <option value="GN">Guinea</option>
	                                                    <option value="GW">Guinea-Bissau</option>
	                                                    <option value="GY">Guyana</option>
	                                                    <option value="HT">Haiti</option>
	                                                    <option value="HM">Heard Island and McDonald Islands</option>
	                                                    <option value="VA">Holy See (Vatican City State)</option>
	                                                    <option value="HN">Honduras</option>
	                                                    <option value="HK">Hong Kong</option>
	                                                    <option value="HU">Hungary</option>
	                                                    <option value="IS">Iceland</option>
	                                                    <option value="IN">India</option>
	                                                    <option value="ID">Indonesia</option>
	                                                    <option value="IR">Iran, Islamic Republic of</option>
	                                                    <option value="IQ">Iraq</option>
	                                                    <option value="IE">Ireland</option>
	                                                    <option value="IM">Isle of Man</option>
	                                                    <option value="IL">Israel</option>
	                                                    <option value="IT">Italy</option>
	                                                    <option value="JM">Jamaica</option>
	                                                    <option value="JP">Japan</option>
	                                                    <option value="JE">Jersey</option>
	                                                    <option value="JO">Jordan</option>
	                                                    <option value="KZ">Kazakhstan</option>
	                                                    <option value="KE">Kenya</option>
	                                                    <option value="KI">Kiribati</option>
	                                                    <option value="KP">Korea, Democratic People's Republic of</option>
	                                                    <option value="KR">Korea, Republic of</option>
	                                                    <option value="KW">Kuwait</option>
	                                                    <option value="KG">Kyrgyzstan</option>
	                                                    <option value="LA">Lao People's Democratic Republic</option>
	                                                    <option value="LV">Latvia</option>
	                                                    <option value="LB">Lebanon</option>
	                                                    <option value="LS">Lesotho</option>
	                                                    <option value="LR">Liberia</option>
	                                                    <option value="LY">Libya</option>
	                                                    <option value="LI">Liechtenstein</option>
	                                                    <option value="LT">Lithuania</option>
	                                                    <option value="LU">Luxembourg</option>
	                                                    <option value="MO">Macao</option>
	                                                    <option value="MK">Macedonia, the former Yugoslav Republic of
	                                                    </option>
	                                                    <option value="MG">Madagascar</option>
	                                                    <option value="MW">Malawi</option>
	                                                    <option value="MY">Malaysia</option>
	                                                    <option value="MV">Maldives</option>
	                                                    <option value="ML">Mali</option>
	                                                    <option value="MT">Malta</option>
	                                                    <option value="MH">Marshall Islands</option>
	                                                    <option value="MQ">Martinique</option>
	                                                    <option value="MR">Mauritania</option>
	                                                    <option value="MU">Mauritius</option>
	                                                    <option value="YT">Mayotte</option>
	                                                    <option value="MX">Mexico</option>
	                                                    <option value="FM">Micronesia, Federated States of</option>
	                                                    <option value="MD">Moldova, Republic of</option>
	                                                    <option value="MC">Monaco</option>
	                                                    <option value="MN">Mongolia</option>
	                                                    <option value="ME">Montenegro</option>
	                                                    <option value="MS">Montserrat</option>
	                                                    <option value="MA">Morocco</option>
	                                                    <option value="MZ">Mozambique</option>
	                                                    <option value="MM">Myanmar</option>
	                                                    <option value="NA">Namibia</option>
	                                                    <option value="NR">Nauru</option>
	                                                    <option value="NP">Nepal</option>
	                                                    <option value="NL">Netherlands</option>
	                                                    <option value="NC">New Caledonia</option>
	                                                    <option value="NZ">New Zealand</option>
	                                                    <option value="NI">Nicaragua</option>
	                                                    <option value="NE">Niger</option>
	                                                    <option value="NG">Nigeria</option>
	                                                    <option value="NU">Niue</option>
	                                                    <option value="NF">Norfolk Island</option>
	                                                    <option value="MP">Northern Mariana Islands</option>
	                                                    <option value="NO">Norway</option>
	                                                    <option value="OM">Oman</option>
	                                                    <option value="PK">Pakistan</option>
	                                                    <option value="PW">Palau</option>
	                                                    <option value="PS">Palestinian Territory, Occupied</option>
	                                                    <option value="PA">Panama</option>
	                                                    <option value="PG">Papua New Guinea</option>
	                                                    <option value="PY">Paraguay</option>
	                                                    <option value="PE">Peru</option>
	                                                    <option value="PH">Philippines</option>
	                                                    <option value="PN">Pitcairn</option>
	                                                    <option value="PL">Poland</option>
	                                                    <option value="PT">Portugal</option>
	                                                    <option value="PR">Puerto Rico</option>
	                                                    <option value="QA">Qatar</option>
	                                                    <option value="RE">Réunion</option>
	                                                    <option value="RO">Romania</option>
	                                                    <option value="RU">Russian Federation</option>
	                                                    <option value="RW">Rwanda</option>
	                                                    <option value="BL">Saint Barthélemy</option>
	                                                    <option value="SH">Saint Helena, Ascension and Tristan da Cunha
	                                                    </option>
	                                                    <option value="KN">Saint Kitts and Nevis</option>
	                                                    <option value="LC">Saint Lucia</option>
	                                                    <option value="MF">Saint Martin (French part)</option>
	                                                    <option value="PM">Saint Pierre and Miquelon</option>
	                                                    <option value="VC">Saint Vincent and the Grenadines</option>
	                                                    <option value="WS">Samoa</option>
	                                                    <option value="SM">San Marino</option>
	                                                    <option value="ST">Sao Tome and Principe</option>
	                                                    <option value="SA">Saudi Arabia</option>
	                                                    <option value="SN">Senegal</option>
	                                                    <option value="RS">Serbia</option>
	                                                    <option value="SC">Seychelles</option>
	                                                    <option value="SL">Sierra Leone</option>
	                                                    <option value="SG">Singapore</option>
	                                                    <option value="SX">Sint Maarten (Dutch part)</option>
	                                                    <option value="SK">Slovakia</option>
	                                                    <option value="SI">Slovenia</option>
	                                                    <option value="SB">Solomon Islands</option>
	                                                    <option value="SO">Somalia</option>
	                                                    <option value="ZA">South Africa</option>
	                                                    <option value="GS">South Georgia and the South Sandwich Islands
	                                                    </option>
	                                                    <option value="SS">South Sudan</option>
	                                                    <option value="ES">Spain</option>
	                                                    <option value="LK">Sri Lanka</option>
	                                                    <option value="SD">Sudan</option>
	                                                    <option value="SR">Suriname</option>
	                                                    <option value="SJ">Svalbard and Jan Mayen</option>
	                                                    <option value="SZ">Swaziland</option>
	                                                    <option value="SE">Sweden</option>
	                                                    <option value="CH">Switzerland</option>
	                                                    <option value="SY">Syrian Arab Republic</option>
	                                                    <option value="TW">Taiwan, Province of China</option>
	                                                    <option value="TJ">Tajikistan</option>
	                                                    <option value="TZ">Tanzania, United Republic of</option>
	                                                    <option value="TH">Thailand</option>
	                                                    <option value="TL">Timor-Leste</option>
	                                                    <option value="TG">Togo</option>
	                                                    <option value="TK">Tokelau</option>
	                                                    <option value="TO">Tonga</option>
	                                                    <option value="TT">Trinidad and Tobago</option>
	                                                    <option value="TN">Tunisia</option>
	                                                    <option value="TR">Turkey</option>
	                                                    <option value="TM">Turkmenistan</option>
	                                                    <option value="TC">Turks and Caicos Islands</option>
	                                                    <option value="TV">Tuvalu</option>
	                                                    <option value="UG">Uganda</option>
	                                                    <option value="UA">Ukraine</option>
	                                                    <option value="AE">United Arab Emirates</option>
	                                                    <option value="GB">United Kingdom</option>
	                                                    <option value="US">United States</option>
	                                                    <option value="UM">United States Minor Outlying Islands</option>
	                                                    <option value="UY">Uruguay</option>
	                                                    <option value="UZ">Uzbekistan</option>
	                                                    <option value="VU">Vanuatu</option>
	                                                    <option value="VE">Venezuela, Bolivarian Republic of</option>
	                                                    <option value="VN">Viet Nam</option>
	                                                    <option value="VG">Virgin Islands, British</option>
	                                                    <option value="VI">Virgin Islands, U.S.</option>
	                                                    <option value="WF">Wallis and Futuna</option>
	                                                    <option value="EH">Western Sahara</option>
	                                                    <option value="YE">Yemen</option>
	                                                    <option value="ZM">Zambia</option>
	                                                    <option value="ZW">Zimbabwe</option>
	                                                </select>
	                                            </div>
	                                            <!--end::Select-->
	                                        </div>
	                                    </div>
	                                </div>
	                                <!--end::Wizard Step 1-->

	                                <!--begin::Wizard Step 2-->
	                                <div class="pb-5" data-wizard-type="step-content">
	                                    <h4 class="mb-10 font-weight-bold text-dark">Enter the Details of your Delivery
	                                    </h4>
	                                    <!--begin::Input-->
	                                    <div class="form-group">
	                                        <label>Package Details</label>
	                                        <input type="text" class="form-control form-control-solid form-control-lg"
	                                            name="package" placeholder="Package Details"
	                                            value="Complete Workstation (Monitor, Computer, Keyboard & Mouse)" />
	                                        <span class="form-text text-muted">Please enter your Pakcage Details.</span>
	                                    </div>
	                                    <!--end::Input-->

	                                    <!--begin::Input-->
	                                    <div class="form-group">
	                                        <label>Package Weight in KG</label>
	                                        <input type="text" class="form-control form-control-solid form-control-lg"
	                                            name="weight" placeholder="Package Weight" value="25" />
	                                        <span class="form-text text-muted">Please enter your Package Weight in
	                                            KG.</span>
	                                    </div>
	                                    <!--end::Input-->

	                                    <div class="row">
	                                        <div class="col-xl-4">
	                                            <!--begin::Input-->
	                                            <div class="form-group">
	                                                <label>Package Width in CM</label>
	                                                <input type="text"
	                                                    class="form-control form-control-solid form-control-lg"
	                                                    name="width" placeholder="Package Width" value="110" />
	                                                <span class="form-text text-muted">Please enter your Package Width in
	                                                    CM.</span>
	                                            </div>
	                                            <!--end::Input-->
	                                        </div>
	                                        <div class="col-xl-4">
	                                            <!--begin::Input-->
	                                            <div class="form-group">
	                                                <label>Package Height in CM</label>
	                                                <input type="text"
	                                                    class="form-control form-control-solid form-control-lg"
	                                                    name="height" placeholder="Package Height" value="90" />
	                                                <span class="form-text text-muted">Please enter your Package Height in
	                                                    CM.</span>
	                                            </div>
	                                            <!--end::Input-->
	                                        </div>
	                                        <div class="col-xl-4">
	                                            <!--begin::Input-->
	                                            <div class="form-group">
	                                                <label>Package Length in CM</label>
	                                                <input type="text"
	                                                    class="form-control form-control-solid form-control-lg"
	                                                    name="packagelength" placeholder="Package Length" value="150" />
	                                                <span class="form-text text-muted">Please enter your Package Length in
	                                                    CM.</span>
	                                            </div>
	                                            <!--end::Input-->
	                                        </div>
	                                    </div>
	                                </div>
	                                <!--end::Wizard Step 2-->

	                                <!--begin::Wizard Actions-->
	                                <div class="d-flex justify-content-between border-top mt-5 pt-10">
	                                    <div class="mr-2">
	                                        <button type="button"
	                                            class="btn btn-light-primary font-weight-bold text-uppercase px-9 py-4"
	                                            data-wizard-type="action-prev">
	                                            Previous
	                                        </button>
	                                    </div>
	                                    <div>
	                                        <button type="button"
	                                            class="btn btn-success font-weight-bold text-uppercase px-9 py-4"
	                                            data-wizard-type="action-submit">
	                                            Submit
	                                        </button>
	                                        <button type="button"
	                                            class="btn btn-primary font-weight-bold text-uppercase px-9 py-4"
	                                            data-wizard-type="action-next">
	                                            Next
	                                        </button>
	                                    </div>
	                                </div>
	                                <!--end::Wizard Actions-->
	                            </form>
	                            <!--end::Wizard Form-->
	                        </div>
	                    </div>
	                    <!--end::Wizard Body-->
	                </div>
	                <!--end::Wizard-->
	            </div>
	            <!--end::Wizard-->
	        </div>
	    </div>
	    <!--end::Container-->
    </div>
    
<script>

// Class definition
var KTWizard1 = function () {
	// Base elements
	var _wizardEl;
	var _formEl;
	var _wizard;
	var _validations = [];

	// Private functions
	var initWizard = function () {
		// Initialize form wizard
		_wizard = new KTWizard(_wizardEl, {
			startStep: 1, // initial active step number
			clickableSteps: true  // allow step clicking
		});

		// Validation before going to next page
		_wizard.on('beforeNext', function (wizard) {
			// Don't go to the next step yet
			_wizard.stop();

			// Validate form
			var validator = _validations[wizard.getStep() - 1]; // get validator for currnt step
			validator.validate().then(function (status) {
				if (status == 'Valid') {
					_wizard.goNext();
					KTUtil.scrollTop();
				} else {
					Swal.fire({
						text: "Masih ada field yang kosong",
						icon: "error",
						buttonsStyling: false,
						confirmButtonText: "Baik!",
						customClass: {
							confirmButton: "btn font-weight-bold btn-light"
						}
					}).then(function () {
						KTUtil.scrollTop();
					});
				}
			});
		});

		// Change event
		_wizard.on('change', function (wizard) {
			KTUtil.scrollTop();
		});
	}

	var initValidation = function () {
		// Init form validation rules. For more info check the FormValidation plugin's official documentation:https://formvalidation.io/
		// Step 1
		_validations.push(FormValidation.formValidation(
			_formEl,
			{
				fields: {
					address1: {
						validators: {
							notEmpty: {
								message: 'Address is required'
							}
						}
					},
					postcode: {
						validators: {
							notEmpty: {
								message: 'Postcode is required'
							}
						}
					},
					city: {
						validators: {
							notEmpty: {
								message: 'City is required'
							}
						}
					},
					state: {
						validators: {
							notEmpty: {
								message: 'State is required'
							}
						}
					},
					country: {
						validators: {
							notEmpty: {
								message: 'Country is required'
							}
						}
					}
				},
				plugins: {
					trigger: new FormValidation.plugins.Trigger(),
					bootstrap: new FormValidation.plugins.Bootstrap()
				}
			}
		));

		// Step 2
		_validations.push(FormValidation.formValidation(
			_formEl,
			{
				fields: {
					package: {
						validators: {
							notEmpty: {
								message: 'Package details is required'
							}
						}
					},
					weight: {
						validators: {
							notEmpty: {
								message: 'Package weight is required'
							},
							digits: {
								message: 'The value added is not valid'
							}
						}
					},
					width: {
						validators: {
							notEmpty: {
								message: 'Package width is required'
							},
							digits: {
								message: 'The value added is not valid'
							}
						}
					},
					height: {
						validators: {
							notEmpty: {
								message: 'Package height is required'
							},
							digits: {
								message: 'The value added is not valid'
							}
						}
					},
					packagelength: {
						validators: {
							notEmpty: {
								message: 'Package length is required'
							},
							digits: {
								message: 'The value added is not valid'
							}
						}
					}
				},
				plugins: {
					trigger: new FormValidation.plugins.Trigger(),
					bootstrap: new FormValidation.plugins.Bootstrap()
				}
			}
		));

		// Step 3
		_validations.push(FormValidation.formValidation(
			_formEl,
			{
				fields: {
					delivery: {
						validators: {
							notEmpty: {
								message: 'Delivery type is required'
							}
						}
					},
					packaging: {
						validators: {
							notEmpty: {
								message: 'Packaging type is required'
							}
						}
					},
					preferreddelivery: {
						validators: {
							notEmpty: {
								message: 'Preferred delivery window is required'
							}
						}
					}
				},
				plugins: {
					trigger: new FormValidation.plugins.Trigger(),
					bootstrap: new FormValidation.plugins.Bootstrap()
				}
			}
		));

		// Step 4
		_validations.push(FormValidation.formValidation(
			_formEl,
			{
				fields: {
					locaddress1: {
						validators: {
							notEmpty: {
								message: 'Address is required'
							}
						}
					},
					locpostcode: {
						validators: {
							notEmpty: {
								message: 'Postcode is required'
							}
						}
					},
					loccity: {
						validators: {
							notEmpty: {
								message: 'City is required'
							}
						}
					},
					locstate: {
						validators: {
							notEmpty: {
								message: 'State is required'
							}
						}
					},
					loccountry: {
						validators: {
							notEmpty: {
								message: 'Country is required'
							}
						}
					}
				},
				plugins: {
					trigger: new FormValidation.plugins.Trigger(),
					bootstrap: new FormValidation.plugins.Bootstrap()
				}
			}
		));
	}

	return {
		// public functions
		init: function () {
			_wizardEl = KTUtil.getById('kt_wizard_v1');
			_formEl = KTUtil.getById('kt_form');

			initWizard();
			initValidation();
		}
	};
}();

jQuery(document).ready(function () {
	KTWizard1.init();
});

</script>