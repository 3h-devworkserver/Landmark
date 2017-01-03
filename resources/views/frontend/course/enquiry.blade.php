<html lang="en" style="background:#fbfbfb;">
  <head>
    <meta charset="UTF-8">
  </head>
  <body>
    <div style="margin:0 auto; padding:50px 0; width: 100%;">
      <center>
      <table style="width:600px; margin:0px auto; padding:0px;" cellpadding="0" cellspacing="0" border="0">
        <tr class="logo">
          <td style="padding:20px 10px; margin:0; text-align:center;">
            <a href="" style="display:block;">
              <img class="w320" src="{{ asset('/img/'.$logo->logo) }}" alt="company logo">
            </a>
          </td>
        </tr>
      </table>
        <table style="width:600px; margin:0px auto; background:#fff; padding:0px; border:1px solid #ececec" cellpadding="0" cellspacing="0" border="0">
        <tr class="main-content" style="padding:0; margin:0;">
          <td style="font-size:14px;padding:20px 20px 0;font-weight:600;font-family:Arial; margin:0px;">
            <p style="padding:0 0 5px 0; margin: 0;">Hello Admin,</p>
          </td>
        </tr>
        <tr>
          <td style="font-size:14px; padding:10px 20px ; margin:0; font-family:Arial;" class="mobile-spacing">
            <p style="padding:0 0 5px 0; margin:0; color: #52595f;">Please find below the detail that have been queried by <b>{{ $user['first_name'] }}</b> for course <b>{{ $user['coursename'] }}.</b></p>
          </td>
        </tr>
        <tr>
          <td style="padding:10px 20px 0; margin:0; font-size:14px; font-family:Arial; ">
            <table style="padding:10px 20px; margin:0; background:#fafafa; width:100%;border-bottom:1px solid #dddddd;">
              <tr>
                <td style="width:40%; text-align: left;">
                  <b style="margin:0 20px 0 0; padding:0;">First Name:</b>
                </td>
                <td align="left" style="text-align: left; width: 60%;">
                  {{ $user['first_name']}}
                </td>
              </tr>
            </table>
            <table style="padding:5px 20px; margin:0; background:#fafafa; width:100%;border-bottom:1px solid #dddddd;">
              <tr>
                <td style="width:40%; text-align: left;">
                  <b style="margin:0 20px 0 0; padding:0;">Last Name:</b>
                </td>
                <td align="left" style="text-align: left; width: 60%;">
                  {{ $user['last_name']}}
                </td>
              </tr>
            </table>
            <table style="padding:5px 20px; margin:0; background:#fafafa; width:100%;border-bottom:1px solid #dddddd;">
              <tr>
                <td style="width:40%; text-align: left;">
                  <b style="margin:0 20px 0 0; padding:0;">Gender:</b>
                </td>
                <td align="left" style="text-align: left; width: 60%;">
                  {{ $user['gender']}}
                </td>
              </tr>
            </table>
            <table style="padding:5px 20px; margin:0; background:#fafafa; width:100%;border-bottom:1px solid #dddddd;">
              <tr>
                <td style="width:40%; text-align: left;">
                  <b style="margin:0 20px 0 0; padding:0;">Date of Birth:</b>
                </td>
                <td align="left" style="text-align: left; width: 60%;">
                  {{ $user['dob_day'] . '/' }}{{ $user['dob_month'] . '/' }}{{ $user['dob_year'] }}
                </td>
              </tr>
            </table>
            <table style="padding:5px 20px; margin:0; background:#fafafa; width:100%;border-bottom:1px solid #dddddd;">
              <tr>
                <td style="width:40%; text-align: left;">
                  <b style="margin:0 20px 0 0; padding:0;">Visa Status:</b>
                </td>
                <td align="left" style="text-align: left; width: 60%;">
                  {{ $user['visa_status']}}
                </td>
              </tr>
            </table>
            <table style="padding:5px 20px; margin:0; background:#fafafa; width:100%;border-bottom:1px solid #dddddd;">
              <tr>
                <td style="width:40%; text-align: left;">
                  <b style="margin:0 20px 0 0; padding:0;">Email Address:</b>
                </td>
                <td align="left" style="text-align: left; width: 60%;">
                  {{ $user['email']}}
                </td>
              </tr>
            </table>
            
            <table style="padding:5px 20px; margin:0; background:#fafafa; width:100%;border-bottom:1px solid #dddddd;">
              <tr>
                <td style="width:40%; text-align: left;">
                  <b style="margin:0 20px 0 0; padding:0;">Currently in Australia or not?</b>
                </td>
                <td align="left" style="text-align: left; width: 60%;">
                  {{ $user['in_australia']}}
                </td>
              </tr>
            </table>
            <table style="padding:5px 20px; margin:0; background:#fafafa; width:100%;border-bottom:1px solid #dddddd;">
              <tr>
                <td style="width:40%; text-align: left;">
                  <b style="margin:0 20px 0 0; padding:0;">Start Study Date: </b>
                </td>
                <td align="left" style="text-align: left; width: 60%;">
                  {{ $user['start_study']}}
                </td>
              </tr>
            </table>
            <table style="padding:5px 20px; margin:0; background:#fafafa; width:100%;border-bottom:1px solid #dddddd;">
              <tr>
                <td style="width:40%; text-align: left;">
                  <b style="margin:0 20px 0 0; padding:0;">Phone: </b>
                </td>
                <td align="left" style="text-align: left; width: 60%;">
                  {{ $user['phone']}}
                </td>
              </tr>
            </table>
            @if(!empty($user['topics']))
            <table style="padding:5px 20px; margin:0; background:#fafafa; width: 100%;border-bottom:1px solid #dddddd;">
              <tr>
                <td align="left" style="width:40%;"><b style="margin:0 20px 0 0; padding:0;">Topics users want to get more information:</b></td>
                <td align="left" style="width: 60%; text-align: left;">
                  <ul style="list-style:none;">
                    @foreach( $user['topics'] as $key => $topics)
                    <li style="list-style:none;">{{ $topics}}</li>
                    @endforeach
                  </ul>
                </td>
              </tr>
            </table>
            @endif
            <table style="padding:5px 20px; margin:0; background:#fafafa; width: 100%;border-bottom:1px solid #dddddd;">
              <tr>
                <td align="left" style="width:40%;"><b style="margin:0 20px 0 0; padding:0;">Comments:</b></td>
                <td align="left" style="width: 60%; text-align: left;">
                  {{ $user['comments'] }}
                </td>
              </tr>
            </table>
            @if(!empty($user['receive_phone_call']))
            <table style="padding:5px 20px; margin:0; background:#fafafa; width: 100%;border-bottom:1px solid #dddddd;">
              <tr>
                <td align="left" style="width:40%;"><b style="margin:0 20px 0 0; padding:0;">Either want to receive phone call or not :</b></td>
                <td align="left" style="width: 60%; text-align: left;">
                  @if($user['receive_phone_call'] == 'on')
                  {{ 'yes' }}
                  @else
                  {{ 'no' }}
                  @endif
                </td>
              </tr>
            </table>
            @endif
            @if(!empty($user['best_contact_time']))
            <table style="padding:5px 20px; margin:0; background:#fafafa; width: 100%;border-bottom:1px solid #dddddd;">
              <tr>
                <td align="left" style="width:40%;"><b style="margin:0 20px 0 0; padding:0;">Best contact time:</b></td>
                <td align="left" style="width: 60%; text-align: left;">
                  {{ $user['best_contact_time'] }}
                </td>
              </tr>
            </table>
            @endif
            @if(!empty($user['receive_updates']))
            <table style="padding:5px 20px; margin:0; background:#fafafa; width: 100%;border-bottom:1px solid #dddddd;">
              <tr>
                <td align="left" style="width:40%;"><b style="margin:0 20px 0 0; padding:0;">Either want to receive updates or not :</b></td>
                <td align="left" style="width: 60%; text-align: left;">
                  @if($user['receive_updates'] == 'on')
                  {{ 'yes' }}
                  @else
                  {{ 'no' }}
                  @endif
                </td>
              </tr>
            </table>
            @endif
          </td>
          
        </tr>
        <tr>
          <td style="background:#fff; padding:10px;"></td>
        </tr>
        <tr style="font-size:14px; padding:0px; margin:0; font-family:Arial;" class="w320 mobile-spacing">
          <td style="padding:20px 20px;">
            <p style="padding:0 0 5px 0; margin:0; color:#52595f; font-style: italic;">If you have any questions about your account or any other matter, please feel free to contact us at <a style="color:#500847;" href="mailto:info@landmark.edu.np"> info@landmark.edu.np</a> or by phone at <a style="color:#500847;" href="tel:+977 1 4442781">+977 1 4442781</a>, <a style="color:#500847;" href="tel:+977 1 4431760">+977 1 4431760</a></p>
          </td>
        </tr>
        <tr class="footer" style="padding:0; margin:0;">
          <td style="padding:0 20px 10px;font-family:Arial;">
            <p style="font-size:14px;line-height:normal;
            margin:0; padding:20px 0 0 0; color:#52595f; border-top:1px dashed #ccc;">Thank You,</p>
          </td>
        </tr>
        <tr>
          <td style="font-weight: bold;font-family:Arial; padding:0 20px 0">
            <p style="font-size:14px;line-height:normal; margin:0; padding:0;">New plaza marga (Opposite to Kumari Bank)</p>
          </td>
        </tr>
        <tr>
          <td style="font-family:Arial; padding:0 20px 20px ">
            <p style="font-size:14px;line-height:normal; margin:0; padding:0; color:#52595f;">Putalisadak, Kathmandu</p>
          </td>
        </tr>
      </table>
      </center>
    </div>
  </body></html>