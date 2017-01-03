<!-- Modal -->
<div class="modal fade" id="modal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title" id="myModalLabel">Enquiry Form</h4>
            </div>
            <form method="POST" action="javascript:;" accept-charset="UTF-8" class="enquiry-form-modal" id="enquiryform" novalidate="novalidate">
                <div class="modal-body">
                    <input type="hidden" name="_token" value="{{ csrf_token() }}">
                    <input type="hidden" name="coursename" value="{{ $course }}">
                    <div class="row">
                        <div class="col-md-3 col-sm-4">
                            <!-- <div class="image-wrap"> -->
                                <div class="course-img bg-image" style="background-image:url({{ $image }})"></div>
                                <!-- <img id="enquiry-logo" src="{{ $image }}"> -->
                            <!-- </div> -->
                        </div>
                        <div class="col-md-9 col-sm-8">
                            <h3>
                            <a id="enquiry-course-name" href="{{ $url }}">{{ $course }}</a>
                        </h3>
                            <p id="enquiry-course-description"></p>
                        </div>
                    </div>
                    <hr>
                    <div class="row">
                        <div class="col-md-4 col-sm-4">
                            <div class="form-group">
                                <label for="first_name" class="control-label">First Name <em>*</em></label>
                                <input class="form-control required" name="first_name" value="" id="first_name" type="text">
                            </div>
                        </div>
                        <div class="col-md-4 col-sm-4">
                            <div class="form-group">
                                <label for="last_name" class="control-label">Last name <em>*</em></label>
                                <input class="form-control required" name="last_name" value="" id="last_name" type="text">
                            </div>
                        </div>
                        <div class="col-md-4 col-sm-4">
                            <div class="form-group">
                                <label for="gender" class="control-label">Gender <em>*</em></label>
                                <select class="form-control required" id="gender" name="gender">
                                    <option value="" selected="selected">---</option>
                                    <option value="male">Male</option>
                                    <option value="female">Female</option>
                                    <option value="other">Other</option>
                                </select>
                            </div>
                        </div>
                        <div class="col-md-7 col-sm-12">
                            <div class="form-group clear-fix">
                                <label for="dob" class="control-label">Date of birth <em>*</em></label>
                                <div class="dob-field clear-fix row">
                                    <div class="col-md-4 col-sm-4">
                                        <select id="dob_day" name="dob_day" class="form-control no-brr no-bsr required">
                                            <option value="">Day</option>
                                            @for( $i = 1; $i <= 31; $i++)
                                            <option value="{{$i}}">{{$i}}</option>
                                            @endfor
                                        </select>
                                    </div>
                                    <div class="col-md-4 col-sm-4">
                                        <select id="dob_month" name="dob_month" class="form-control no-br no-bsr required">
                                            <option value="">Month</option>
                                            <option value="01">January</option>
                                            <option value="02">February</option>
                                            <option value="03">March</option>
                                            <option value="04">April</option>
                                            <option value="05">May</option>
                                            <option value="06">June</option>
                                            <option value="07">July</option>
                                            <option value="08">August</option>
                                            <option value="09">September</option>
                                            <option value="10">October</option>
                                            <option value="11">November</option>
                                            <option value="12">December</option>
                                        </select>
                                    </div>
                                    <div class="col-md-4 col-sm-4">
                                        <select id="dob_year" name="dob_year" class="form-control no-brl required">
                                            <option value="">Year</option>
                                            @for( $i = 2008; $i >= 1908; $i--)
                                            <option value="{{$i}}">{{$i}}</option>
                                            @endfor
                                        </select>
                                    </div>
                                </div>
                            </div>
                        </div>
                        
                        <div class="col-md-5 col-sm-6">
                            <div class="form-group">
                                <label for="nationality" class="control-label">Nationality <em>*</em></label>
                                <select class="form-control required" id="nationality" name="nationality">
                                    <option value="" selected="selected">---</option>
                                    <option value="Adelie Land (France)">Adelie Land (France)</option>
                                    <option value="Afghanistan ">Afghanistan </option>
                                    <option value="Albania ">Albania </option>
                                    <option value="Algeria ">Algeria </option>
                                    <option value="Andorra ">Andorra </option>
                                    <option value="Angola ">Angola </option>
                                    <option value="Anguilla ">Anguilla </option>
                                    <option value="Antarctica, nfd ">Antarctica, nfd </option>
                                    <option value="Antigua and Barbuda ">Antigua and Barbuda </option>
                                    <option value="Argentina ">Argentina </option>
                                    <option value="Argentinian Antarctic Territory ">Argentinian Antarctic Territory </option>
                                    <option value="Armenia ">Armenia </option>
                                    <option value="Aruba ">Aruba </option>
                                    <option value="Australia ">Australia </option>
                                    <option value="Australian Antarctic Territory ">Australian Antarctic Territory </option>
                                    <option value="Austria ">Austria </option>
                                    <option value="Azerbaijan ">Azerbaijan </option>
                                    <option value="Bahamas ">Bahamas </option>
                                    <option value="Bahrain ">Bahrain </option>
                                    <option value="Bangladesh ">Bangladesh </option>
                                    <option value="Barbados ">Barbados </option>
                                    <option value="Belarus ">Belarus </option>
                                    <option value="Belgium ">Belgium </option>
                                    <option value="Belize ">Belize </option>
                                    <option value="Benin ">Benin </option>
                                    <option value="Bermuda ">Bermuda </option>
                                    <option value="Bhutan ">Bhutan </option>
                                    <option value="Bolivia ">Bolivia </option>
                                    <option value="Bosnia and Herzegovina ">Bosnia and Herzegovina </option>
                                    <option value="Botswana ">Botswana </option>
                                    <option value="Brazil ">Brazil </option>
                                    <option value="British Antarctic Territory ">British Antarctic Territory </option>
                                    <option value="Brunei Darussalam ">Brunei Darussalam </option>
                                    <option value="Bulgaria ">Bulgaria </option>
                                    <option value="Burkina Faso ">Burkina Faso </option>
                                    <option value="Burma (Myanmar) ">Burma (Myanmar) </option>
                                    <option value="Burundi ">Burundi </option>
                                    <option value="Cambodia ">Cambodia </option>
                                    <option value="Cameroon ">Cameroon </option>
                                    <option value="Canada ">Canada </option>
                                    <option value="Cape Verde ">Cape Verde </option>
                                    <option value="Caribbean, nfd ">Caribbean, nfd </option>
                                    <option value="Cayman Islands ">Cayman Islands </option>
                                    <option value="Central African Republic ">Central African Republic </option>
                                    <option value="Central America, nfd ">Central America, nfd </option>
                                    <option value="Central and West Africa, nfd ">Central and West Africa, nfd </option>
                                    <option value="Central Asia, nfd ">Central Asia, nfd </option>
                                    <option value="Chad ">Chad </option>
                                    <option value="Channel Islands ">Channel Islands </option>
                                    <option value="Chile ">Chile </option>
                                    <option value="Chilean Antarctic Territory ">Chilean Antarctic Territory </option>
                                    <option value="China (excludes SARs and Taiwan Province) ">China (excludes SARs and Taiwan Province) </option>
                                    <option value="Chinese Asia (includes Mongolia), nfd ">Chinese Asia (includes Mongolia), nfd </option>
                                    <option value="Colombia ">Colombia </option>
                                    <option value="Comoros ">Comoros </option>
                                    <option value="Congo ">Congo </option>
                                    <option value="Congo, Democratic Republic of ">Congo, Democratic Republic of </option>
                                    <option value="Cook Islands ">Cook Islands </option>
                                    <option value="Costa Rica ">Costa Rica </option>
                                    <option value="Cote d'Ivoire">Cote d'Ivoire</option>
                                    <option value="Croatia ">Croatia </option>
                                    <option value="Cuba ">Cuba </option>
                                    <option value="Cyprus ">Cyprus </option>
                                    <option value="Czech Republic ">Czech Republic </option>
                                    <option value="Denmark ">Denmark </option>
                                    <option value="Djibouti ">Djibouti </option>
                                    <option value="Dominica ">Dominica </option>
                                    <option value="Dominican Republic ">Dominican Republic </option>
                                    <option value="East Timor">East Timor</option>
                                    <option value="Eastern Europe, nfd ">Eastern Europe, nfd </option>
                                    <option value="Ecuador ">Ecuador </option>
                                    <option value="Egypt ">Egypt </option>
                                    <option value="El Salvador ">El Salvador </option>
                                    <option value="England ">England </option>
                                    <option value="Equatorial Guinea ">Equatorial Guinea </option>
                                    <option value="Eritrea ">Eritrea </option>
                                    <option value="Estonia ">Estonia </option>
                                    <option value="Ethiopia ">Ethiopia </option>
                                    <option value="Faeroe Islands ">Faeroe Islands </option>
                                    <option value="Falkland Islands ">Falkland Islands </option>
                                    <option value="Fiji ">Fiji </option>
                                    <option value="Finland ">Finland </option>
                                    <option value="Former Yugoslav Republic of Macedonia (FYROM) ">Former Yugoslav Republic of Macedonia (FYROM) </option>
                                    <option value="France ">France </option>
                                    <option value="French Guiana ">French Guiana </option>
                                    <option value="French Polynesia ">French Polynesia </option>
                                    <option value="Gabon ">Gabon </option>
                                    <option value="Gambia ">Gambia </option>
                                    <option value="Gaza Strip and West Bank ">Gaza Strip and West Bank </option>
                                    <option value="Georgia ">Georgia </option>
                                    <option value="Germany ">Germany </option>
                                    <option value="Ghana ">Ghana </option>
                                    <option value="Gibraltar ">Gibraltar </option>
                                    <option value="Greece ">Greece </option>
                                    <option value="Greenland ">Greenland </option>
                                    <option value="Grenada ">Grenada </option>
                                    <option value="Guadeloupe ">Guadeloupe </option>
                                    <option value="Guam ">Guam </option>
                                    <option value="Guatemala ">Guatemala </option>
                                    <option value="Guinea ">Guinea </option>
                                    <option value="Guinea-Bissau ">Guinea-Bissau </option>
                                    <option value="Guyana ">Guyana </option>
                                    <option value="Haiti ">Haiti </option>
                                    <option value="Holy See ">Holy See </option>
                                    <option value="Honduras ">Honduras </option>
                                    <option value="Hong Kong (SAR of China) ">Hong Kong (SAR of China) </option>
                                    <option value="Hungary ">Hungary </option>
                                    <option value="Iceland ">Iceland </option>
                                    <option value="India ">India </option>
                                    <option value="Indonesia ">Indonesia </option>
                                    <option value="Iran ">Iran </option>
                                    <option value="Iraq ">Iraq </option>
                                    <option value="Ireland ">Ireland </option>
                                    <option value="Isle of Man ">Isle of Man </option>
                                    <option value="Israel ">Israel </option>
                                    <option value="Italy ">Italy </option>
                                    <option value="Jamaica ">Jamaica </option>
                                    <option value="Japan ">Japan </option>
                                    <option value="Japan and the Koreas, nfd ">Japan and the Koreas, nfd </option>
                                    <option value="Jordan ">Jordan </option>
                                    <option value="Kazakhstan ">Kazakhstan </option>
                                    <option value="Kenya ">Kenya </option>
                                    <option value="Kiribati ">Kiribati </option>
                                    <option value="Korea, Democratic People's Republic of (North) ">Korea, Democratic People's Republic of (North) </option>
                                    <option value="Korea, Republic of (South) ">Korea, Republic of (South) </option>
                                    <option value="Kuwait ">Kuwait </option>
                                    <option value="Kyrgyz Republic ">Kyrgyz Republic </option>
                                    <option value="Laos ">Laos </option>
                                    <option value="Latvia ">Latvia </option>
                                    <option value="Lebanon ">Lebanon </option>
                                    <option value="Lesotho ">Lesotho </option>
                                    <option value="Liberia ">Liberia </option>
                                    <option value="Libya ">Libya </option>
                                    <option value="Liechtenstein ">Liechtenstein </option>
                                    <option value="Lithuania ">Lithuania </option>
                                    <option value="Luxembourg ">Luxembourg </option>
                                    <option value="Macau (SAR of China) ">Macau (SAR of China) </option>
                                    <option value="Madagascar ">Madagascar </option>
                                    <option value="Mainland South-East Asia, nfd ">Mainland South-East Asia, nfd </option>
                                    <option value="Malawi ">Malawi </option>
                                    <option value="Malaysia ">Malaysia </option>
                                    <option value="Maldives ">Maldives </option>
                                    <option value="Mali ">Mali </option>
                                    <option value="Malta ">Malta </option>
                                    <option value="Maritime South-East Asia, nfd ">Maritime South-East Asia, nfd </option>
                                    <option value="Marshall Islands ">Marshall Islands </option>
                                    <option value="Martinique ">Martinique </option>
                                    <option value="Mauritania ">Mauritania </option>
                                    <option value="Mauritius ">Mauritius </option>
                                    <option value="Mayotte ">Mayotte </option>
                                    <option value="Melanesia, nfd ">Melanesia, nfd </option>
                                    <option value="Mexico ">Mexico </option>
                                    <option value="Micronesia">Micronesia</option>
                                    <option value="Micronesia, nfd ">Micronesia, nfd </option>
                                    <option value="Middle East, nfd ">Middle East, nfd </option>
                                    <option value="Moldova ">Moldova </option>
                                    <option value="Monaco ">Monaco </option>
                                    <option value="Mongolia ">Mongolia </option>
                                    <option value="Montserrat ">Montserrat </option>
                                    <option value="Morocco ">Morocco </option>
                                    <option value="Mozambique ">Mozambique </option>
                                    <option value="Namibia ">Namibia </option>
                                    <option value="Nauru ">Nauru </option>
                                    <option value="Nepal ">Nepal </option>
                                    <option value="Netherlands ">Netherlands </option>
                                    <option value="Netherlands Antilles ">Netherlands Antilles </option>
                                    <option value="New Caledonia ">New Caledonia </option>
                                    <option value="New Zealand ">New Zealand </option>
                                    <option value="Nicaragua ">Nicaragua </option>
                                    <option value="Niger ">Niger </option>
                                    <option value="Nigeria ">Nigeria </option>
                                    <option value="Niue ">Niue </option>
                                    <option value="North Africa, nec ">North Africa, nec </option>
                                    <option value="Northern America, nfd ">Northern America, nfd </option>
                                    <option value="Northern Europe, nfd ">Northern Europe, nfd </option>
                                    <option value="Northern Ireland ">Northern Ireland </option>
                                    <option value="Northern Mariana Islands ">Northern Mariana Islands </option>
                                    <option value="Norway ">Norway </option>
                                    <option value="Oman ">Oman </option>
                                    <option value="Pakistan ">Pakistan </option>
                                    <option value="Palau ">Palau </option>
                                    <option value="Palestine">Palestine</option>
                                    <option value="Panama ">Panama </option>
                                    <option value="Papua New Guinea ">Papua New Guinea </option>
                                    <option value="Paraguay ">Paraguay </option>
                                    <option value="Peru ">Peru </option>
                                    <option value="Philippines ">Philippines </option>
                                    <option value="Poland ">Poland </option>
                                    <option value="Polynesia (excludes Hawaii), nec ">Polynesia (excludes Hawaii), nec </option>
                                    <option value="Portugal ">Portugal </option>
                                    <option value="Puerto Rico ">Puerto Rico </option>
                                    <option value="Qatar ">Qatar </option>
                                    <option value="Queen Maud Land (Norway) ">Queen Maud Land (Norway) </option>
                                    <option value="Reunion">Reunion</option>
                                    <option value="Romania ">Romania </option>
                                    <option value="Ross Dependency (New Zealand) ">Ross Dependency (New Zealand) </option>
                                    <option value="Russian Federation ">Russian Federation </option>
                                    <option value="Rwanda ">Rwanda </option>
                                    <option value="Samoa ">Samoa </option>
                                    <option value="Samoa, American ">Samoa, American </option>
                                    <option value="San Marino ">San Marino </option>
                                    <option value="Sao Tome and Principe">Sao Tome and Principe</option>
                                    <option value="Saudi Arabia ">Saudi Arabia </option>
                                    <option value="Scotland ">Scotland </option>
                                    <option value="Senegal ">Senegal </option>
                                    <option value="Seychelles ">Seychelles </option>
                                    <option value="Sierra Leone ">Sierra Leone </option>
                                    <option value="Singapore ">Singapore </option>
                                    <option value="Slovakia ">Slovakia </option>
                                    <option value="Slovenia ">Slovenia </option>
                                    <option value="Solomon Islands ">Solomon Islands </option>
                                    <option value="Somalia ">Somalia </option>
                                    <option value="South Africa ">South Africa </option>
                                    <option value="South America, nec ">South America, nec </option>
                                    <option value="South Eastern Europe, nfd ">South Eastern Europe, nfd </option>
                                    <option value="Southern and East Africa, nec ">Southern and East Africa, nec </option>
                                    <option value="Southern Asia, nfd ">Southern Asia, nfd </option>
                                    <option value="Southern Europe, nfd ">Southern Europe, nfd </option>
                                    <option value="Spain ">Spain </option>
                                    <option value="Sri Lanka ">Sri Lanka </option>
                                    <option value="St Helena ">St Helena </option>
                                    <option value="St Kitts and Nevis ">St Kitts and Nevis </option>
                                    <option value="St Lucia ">St Lucia </option>
                                    <option value="St Pierre and Miquelon ">St Pierre and Miquelon </option>
                                    <option value="St Vincent and the Grenadines ">St Vincent and the Grenadines </option>
                                    <option value="Sudan ">Sudan </option>
                                    <option value="Suriname ">Suriname </option>
                                    <option value="Swaziland ">Swaziland </option>
                                    <option value="Sweden ">Sweden </option>
                                    <option value="Switzerland ">Switzerland </option>
                                    <option value="Syria ">Syria </option>
                                    <option value="Taiwan ">Taiwan </option>
                                    <option value="Tajikistan ">Tajikistan </option>
                                    <option value="Tanzania ">Tanzania </option>
                                    <option value="Thailand ">Thailand </option>
                                    <option value="Togo ">Togo </option>
                                    <option value="Tokelau ">Tokelau </option>
                                    <option value="Tonga ">Tonga </option>
                                    <option value="Trinidad and Tobago ">Trinidad and Tobago </option>
                                    <option value="Tunisia ">Tunisia </option>
                                    <option value="Turkey ">Turkey </option>
                                    <option value="Turkmenistan ">Turkmenistan </option>
                                    <option value="Turks and Caicos Islands ">Turks and Caicos Islands </option>
                                    <option value="Tuvalu ">Tuvalu </option>
                                    <option value="Uganda ">Uganda </option>
                                    <option value="Ukraine ">Ukraine </option>
                                    <option value="United Arab Emirates ">United Arab Emirates </option>
                                    <option value="United Kingdom, nfd ">United Kingdom, nfd </option>
                                    <option value="United States of America ">United States of America </option>
                                    <option value="Uruguay ">Uruguay </option>
                                    <option value="Uzbekistan ">Uzbekistan </option>
                                    <option value="Vanuatu ">Vanuatu </option>
                                    <option value="Venezuela ">Venezuela </option>
                                    <option value="Viet Nam ">Viet Nam </option>
                                    <option value="Virgin Islands, British ">Virgin Islands, British </option>
                                    <option value="Virgin Islands, United States ">Virgin Islands, United States </option>
                                    <option value="Wales ">Wales </option>
                                    <option value="Wallis and Futuna ">Wallis and Futuna </option>
                                    <option value="Western Europe, nfd ">Western Europe, nfd </option>
                                    <option value="Western Sahara ">Western Sahara </option>
                                    <option value="Yemen ">Yemen </option>
                                    <option value="Yugoslavia, Federal Republic of ">Yugoslavia, Federal Republic of </option>
                                    <option value="Zambia ">Zambia </option>
                                    <option value="Zimbabwe ">Zimbabwe </option>
                                </select>
                            </div>
                        </div>
                        <div class="col-md-4 col-sm-6">
                            <div class="form-group">
                                <label for="visa_status" class="control-label">Current Visa status <em>*</em></label>
                                <select class="form-control required" id="visa_status" name="visa_status">
                                    <option value="" selected="selected">---</option>
                                    <option value="I do not have a visa">I do not have a visa</option>
                                    <option value="Visa application submitted for processing">Visa application submitted for processing</option>
                                    <option value="I have an appropriate visa to study in Australia">I have an appropriate visa to study in Australia</option>
                                </select>
                            </div>
                        </div>
                        <div class="col-md-4 col-sm-6">
                            <div class="form-group">
                                <label for="email" class="control-label">Email <em>*</em></label>
                                <input class="form-control required" name="email" value="" id="email" type="text">
                            </div>
                        </div>
                        <div class="col-md-4 col-sm-6">
                            <div class="form-group">
                                <label for="in_australia" class="control-label">Are you currently in Australia? <em>*</em></label>
                                <select class="form-control required" id="in_australia" name="in_australia">
                                    <option value="" selected="selected">---</option>
                                    <option value="yes">Yes</option>
                                    <option value="no">No</option>
                                </select>
                            </div>
                        </div>
                        <div class="col-md-4 col-sm-6">
                            <div class="form-group">
                                <label for="start_study" class="control-label">Start study date <em>*</em></label>
                                <input class="form-control required datepicker" name="start_study" value="" id="start_study" type="text">
                            </div>
                        </div>
                        <div class="col-md-4 col-sm-6">
                            <div class="form-group">
                                <label for="phone" class="control-label">Phone <em>*</em></label>
                                <input class="form-control required" name="phone" value="" id="phone" type="text">
                            </div>
                        </div>

                        <?php 
                        $collegeids = DB::table('course_details')->select('college_id')->where('course_name',$course)->first();
                        $ids = explode(',', $collegeids->college_id);
                        ?>
                          <div class="col-md-4 col-sm-6">
                            <div class="form-group">
                                <label for="in_australia" class="control-label">Select College <em>*</em></label>
                                <select class="form-control required" id="in_australia" name="in_australia">
                                    <option value="" selected="selected">---</option>
                                     @foreach( $ids as $key => $id)
                                     <?php $collegename = DB::table('college_details')->select('college_name')->where('collegeid',$id)->first();?>
                                     <option value="{{$id}}">{{$collegename->college_name}}</option>
                                     @endforeach
                                </select>
                            </div>
                        </div>
                      
                    </div>
                    <hr>
                    <div class="row">
                        <div class="col-md-12">
                            <p class="lead">
                                <strong>
                        Would you like more information on the following topics?
                      </strong>
                            </p>
                        </div>
                        <div class="col-md-4 col-sm-6">
                            <div class="checkbox">
                                <label>
                                    <input name="topics[]" value="Accommodation" type="checkbox"> Accommodation
                                </label>
                            </div>
                        </div>
                        <div class="col-md-4 col-sm-6">
                            <div class="checkbox">
                                <label>
                                    <input name="topics[]" value="Cost of living" type="checkbox"> Cost of living
                                </label>
                            </div>
                        </div>
                        <div class="col-md-4 col-sm-6">
                            <div class="checkbox">
                                <label>
                                    <input name="topics[]" value="Courses" type="checkbox"> Courses
                                </label>
                            </div>
                        </div>
                        <div class="col-md-4 col-sm-6">
                            <div class="checkbox">
                                <label>
                                    <input name="topics[]" value="English language studies" type="checkbox"> English language studies
                                </label>
                            </div>
                        </div>
                        <div class="col-md-4 col-sm-6">
                            <div class="checkbox">
                                <label>
                                    <input name="topics[]" value="Health Cover" type="checkbox"> Health Cover
                                </label>
                            </div>
                        </div>
                        <div class="col-md-4 col-sm-6">
                            <div class="checkbox">
                                <label>
                                    <input name="topics[]" value="Location Information" type="checkbox"> Location Information
                                </label>
                            </div>
                        </div>
                        <div class="col-md-4 col-sm-6">
                            <div class="checkbox">
                                <label>
                                    <input name="topics[]" value="Scholarships" type="checkbox"> Scholarships
                                </label>
                            </div>
                        </div>
                        <div class="col-md-4 col-sm-6">
                            <div class="checkbox">
                                <label>
                                    <input name="topics[]" value="Support Services" type="checkbox"> Support Services
                                </label>
                            </div>
                        </div>
                        <div class="col-md-4 col-sm-6">
                            <div class="checkbox">
                                <label>
                                    <input name="topics[]" value="Tuition Fees" type="checkbox"> Tuition Fees
                                </label>
                            </div>
                        </div>
                        <div class="col-md-4 col-sm-6">
                            <div class="checkbox">
                                <label>
                                    <input name="topics[]" value="Visa Requirements" type="checkbox"> Visa Requirements
                                </label>
                            </div>
                        </div>
                    </div>
                    <hr>
                    <div class="row">
                        <div class="col-md-12">
                            <div class="form-group">
                                <label for="comments" class="control-label">Comments/Questions <em>*</em></label>
                                <textarea class="form-control required" name="comments" cols="50" rows="10" id="comments"></textarea>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12">
                            <div class="form-group">
                                <label>
                                    <input name="receive_phone_call" value="1" type="checkbox">
                                    Would you like to receive a phone call from the selected institutions regarding this enquiry?
                                </label>
                            </div>
                            <div class="form-group">
                                <label for="best_contact_time" class="control-label">What is the best time to contact you?</label>
                                <select class="form-control" id="best_contact_time" name="best_contact_time">
                                    <option value="" selected="selected">---</option>
                                    <option value="9:00am - 12:00pm">9:00am - 12:00pm</option>
                                    <option value="12:00pm - 5:30pm">12:00pm - 5:30pm</option>
                                    <option value="5:30pm - 8:00pm">5:30am - 8:00pm</option>
                                </select>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <div class="form-group">
                        <label class="label-checkbox">
                            <input name="receive_updates" checked="" type="checkbox"> I would like to receive updates from Studies in Australia
                        </label>
                    </div>
                    <div class="row">
                        
                        <div class="col-md-7">
                        <div class="successmsg" style="display:none;">
                            <p>Your enquiry has been successfully send. Thank You.</p>
                        </div>
                        </div>
                        <div class=" col-md-5 submit-wrap">
                        <input class="btn btn-outline" value="Submit" type="submit">
                        <img src="{{ asset('/img/loading.gif') }}" id="imgloader" style="display:none;" height="20" width="20">
                        </div>
                        
                    </div>
                    
                </div>
            </form>
        </div>
    </div>
</div>
