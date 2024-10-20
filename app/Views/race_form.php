<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/gh/lipis/flag-icons@6.7.0/css/flag-icons.min.css"/>
    <title><?php if(isset($race)) echo 'Edit race'; else echo 'Add race'?></title>
    <style>
        button{
            width: 80px;
            margin: 1px;
        }
        .navbar {
            background-color: #007bff;
            margin-bottom: 20px;
        }
        .navbar-brand i {
            color: white;
        }
    </style>
</head>
<body>
    <nav class="navbar bg-primary">
        <div class="container-fluid d-flex justify-content-between ">
            <a class="navbar-brand text-white" href="<?= base_url();?>">
                <i class="fas fa-bicycle"></i>
            </a>
            <div class="d-flex">
                <a class="navbar-brand text-white" href="<?= base_url('graphs'); ?>">
                    <i class="fas fa-chart-pie"></i>
                </a>
                <a class="navbar-brand text-white" href="<?= base_url('dashboard'); ?>">
                    <i class="fas fa-square-poll-horizontal"></i>
                </a>
                <a class="navbar-brand text-white" href="<?= base_url('profile'); ?>">
                    <i class="fas fa-user"></i>
                </a>
            </div>
        </div>
    </nav>

    <main>
        <div class="container">
            <h1><?php if(isset($race)) echo 'Edit "'.$race->default_name.'"'; else echo 'Add race'?></h1>
            <form method="post" action="<?php if(isset($race)) echo base_url('race/edit/'.$race->id); else echo base_url('race/add');?>">
                <div class="form-group">
                    <label for="inputName">Name<span class="text-danger" style="padding-left: 2px">*</span></label>
                    <input type="text" class="form-control" id="inputName" placeholder="" name="name" value="<?php if(isset($race)) echo $race->default_name;?>">
                </div>
                <div class="form-group">
                    <label for="inputLink">Link<span class="text-danger" style="padding-left: 2px">*</span></label>
                    <input type="text" class="form-control" id="inputLink" placeholder="" name="link" value="<?php if(isset($race)) echo $race->link;?>">
                </div>
                <div class="form-group">
                    <label for="inputCountry">Country</label>
                    <select class="form-select" id="inputCountry" name="country">
                        <option <?php if(!isset($race)) echo 'selected';?>>None</option>
                        <?php 
                        $countries = array('AF' => 'Afghanistan','AX' => 'Aland Islands','AL' => 'Albania','DZ' => 'Algeria','AS' => 'American Samoa','AD' => 'Andorra','AO' => 'Angola','AI' => 'Anguilla','AQ' => 'Antarctica','AG' => 'Antigua And Barbuda','AR' => 'Argentina','AM' => 'Armenia','AW' => 'Aruba','AU' => 'Australia','AT' => 'Austria','AZ' => 'Azerbaijan','BS' => 'Bahamas','BH' => 'Bahrain','BD' => 'Bangladesh','BB' => 'Barbados','BY' => 'Belarus','BE' => 'Belgium','BZ' => 'Belize','BJ' => 'Benin','BM' => 'Bermuda','BT' => 'Bhutan','BO' => 'Bolivia','BA' => 'Bosnia And Herzegovina','BW' => 'Botswana','BV' => 'Bouvet Island','BR' => 'Brazil','IO' => 'British Indian Ocean Territory','BN' => 'Brunei Darussalam','BG' => 'Bulgaria','BF' => 'Burkina Faso','BI' => 'Burundi','KH' => 'Cambodia','CM' => 'Cameroon','CA' => 'Canada','CV' => 'Cape Verde','KY' => 'Cayman Islands','CF' => 'Central African Republic','TD' => 'Chad','CL' => 'Chile','CN' => 'China','CX' => 'Christmas Island','CC' => 'Cocos (Keeling) Islands','CO' => 'Colombia','KM' => 'Comoros','CG' => 'Congo','CD' => 'Congo, Democratic Republic','CK' => 'Cook Islands','CR' => 'Costa Rica','CI' => 'Cote D\'Ivoire','HR' => 'Croatia','CU' => 'Cuba','CY' => 'Cyprus','CZ' => 'Czech Republic','DK' => 'Denmark','DJ' => 'Djibouti','DM' => 'Dominica','DO' => 'Dominican Republic','EC' => 'Ecuador','EG' => 'Egypt','SV' => 'El Salvador','GQ' => 'Equatorial Guinea','ER' => 'Eritrea','EE' => 'Estonia','ET' => 'Ethiopia','FK' => 'Falkland Islands (Malvinas)','FO' => 'Faroe Islands','FJ' => 'Fiji','FI' => 'Finland','FR' => 'France','GF' => 'French Guiana','PF' => 'French Polynesia','TF' => 'French Southern Territories','GA' => 'Gabon','GM' => 'Gambia','GE' => 'Georgia','DE' => 'Germany','GH' => 'Ghana','GI' => 'Gibraltar','GR' => 'Greece','GL' => 'Greenland','GD' => 'Grenada','GP' => 'Guadeloupe','GU' => 'Guam','GT' => 'Guatemala','GG' => 'Guernsey','GN' => 'Guinea','GW' => 'Guinea-Bissau','GY' => 'Guyana','HT' => 'Haiti','HM' => 'Heard Island & Mcdonald Islands','VA' => 'Holy See (Vatican City State)','HN' => 'Honduras','HK' => 'Hong Kong','HU' => 'Hungary','IS' => 'Iceland','IN' => 'India','ID' => 'Indonesia','IR' => 'Iran, Islamic Republic Of','IQ' => 'Iraq','IE' => 'Ireland','IM' => 'Isle Of Man','IL' => 'Israel','IT' => 'Italy','JM' => 'Jamaica','JP' => 'Japan','JE' => 'Jersey','JO' => 'Jordan','KZ' => 'Kazakhstan','KE' => 'Kenya','KI' => 'Kiribati','KR' => 'Korea','KW' => 'Kuwait','KG' => 'Kyrgyzstan','LA' => 'Lao People\'s Democratic Republic','LV' => 'Latvia','LB' => 'Lebanon','LS' => 'Lesotho','LR' => 'Liberia','LY' => 'Libyan Arab Jamahiriya','LI' => 'Liechtenstein','LT' => 'Lithuania','LU' => 'Luxembourg','MO' => 'Macao','MK' => 'Macedonia','MG' => 'Madagascar','MW' => 'Malawi','MY' => 'Malaysia','MV' => 'Maldives','ML' => 'Mali','MT' => 'Malta','MH' => 'Marshall Islands','MQ' => 'Martinique','MR' => 'Mauritania','MU' => 'Mauritius','YT' => 'Mayotte','MX' => 'Mexico','FM' => 'Micronesia, Federated States Of','MD' => 'Moldova','MC' => 'Monaco','MN' => 'Mongolia','ME' => 'Montenegro','MS' => 'Montserrat','MA' => 'Morocco','MZ' => 'Mozambique','MM' => 'Myanmar','NA' => 'Namibia','NR' => 'Nauru','NP' => 'Nepal','NL' => 'Netherlands','AN' => 'Netherlands Antilles','NC' => 'New Caledonia','NZ' => 'New Zealand','NI' => 'Nicaragua','NE' => 'Niger','NG' => 'Nigeria','NU' => 'Niue','NF' => 'Norfolk Island','MP' => 'Northern Mariana Islands','NO' => 'Norway','OM' => 'Oman','PK' => 'Pakistan','PW' => 'Palau','PS' => 'Palestinian Territory, Occupied','PA' => 'Panama','PG' => 'Papua New Guinea','PY' => 'Paraguay','PE' => 'Peru','PH' => 'Philippines','PN' => 'Pitcairn','PL' => 'Poland','PT' => 'Portugal','PR' => 'Puerto Rico','QA' => 'Qatar','RE' => 'Reunion','RO' => 'Romania','RU' => 'Russian Federation','RW' => 'Rwanda','BL' => 'Saint Barthelemy','SH' => 'Saint Helena','KN' => 'Saint Kitts And Nevis','LC' => 'Saint Lucia','MF' => 'Saint Martin','PM' => 'Saint Pierre And Miquelon','VC' => 'Saint Vincent And Grenadines','WS' => 'Samoa','SM' => 'San Marino','ST' => 'Sao Tome And Principe','SA' => 'Saudi Arabia','SN' => 'Senegal','RS' => 'Serbia','SC' => 'Seychelles','SL' => 'Sierra Leone','SG' => 'Singapore','SK' => 'Slovakia','SI' => 'Slovenia','SB' => 'Solomon Islands','SO' => 'Somalia','ZA' => 'South Africa','GS' => 'South Georgia And Sandwich Isl.','ES' => 'Spain','LK' => 'Sri Lanka','SD' => 'Sudan','SR' => 'Suriname','SJ' => 'Svalbard And Jan Mayen','SZ' => 'Swaziland','SE' => 'Sweden','CH' => 'Switzerland','SY' => 'Syrian Arab Republic','TW' => 'Taiwan','TJ' => 'Tajikistan','TZ' => 'Tanzania','TH' => 'Thailand','TL' => 'Timor-Leste','TG' => 'Togo','TK' => 'Tokelau','TO' => 'Tonga','TT' => 'Trinidad And Tobago','TN' => 'Tunisia','TR' => 'Turkey','TM' => 'Turkmenistan','TC' => 'Turks And Caicos Islands','TV' => 'Tuvalu','UG' => 'Uganda','UA' => 'Ukraine','AE' => 'United Arab Emirates','GB' => 'United Kingdom','US' => 'United States','UM' => 'United States Outlying Islands','UY' => 'Uruguay','UZ' => 'Uzbekistan','VU' => 'Vanuatu','VE' => 'Venezuela','VN' => 'Viet Nam','VG' => 'Virgin Islands, British','VI' => 'Virgin Islands, U.S.','WF' => 'Wallis And Futuna','EH' => 'Western Sahara','YE' => 'Yemen','ZM' => 'Zambia','ZW' => 'Zimbabwe',);
                        foreach($countries as $code => $country) { 
                            echo '<option ';
                            $code = strtolower($code);
                            if(isset($race) && $code == $race->country) echo 'selected ';
                            echo 'value="'.$code.'">'.$country.'</option>';
                        }?>
                    </select>
                </div>
                <div class="form-group">
                    <label for="inputType">Type</label>
                    <input type="text" class="form-control" id="inputType" placeholder="" name="type" value="<?php if(isset($race)) echo $race->type;?>">
                </div>
                <div class="d-flex justify-content-between my-2">
                    <div>
                        <button type="submit" class="btn btn-success"><?php if(isset($race)) echo 'Save'; else echo 'Add'?></button>
                    </div>
                    <div class="text-end text-danger d-flex align-items-center">
                        <span>* Required field</span>
                    </div>
                </div>
                
                
            </form>
        </div>
    </main>
</body>
</html>