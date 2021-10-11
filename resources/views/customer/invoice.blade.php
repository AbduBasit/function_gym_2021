<!DOCTYPE html>
<html lang="en">
<body style="background-color:#ffffff;font-family: Open Sans, sans-serif;font-size:100%;font-weight:400;line-height:1.4;color:#000;">
  Dear {{$data[0]['firstName'] .' ' . $data[0]['lastName']}},
      <br>
      <br>
      Congratulations on starting your fitness journey with Function! We promise to do our best in helping you achieve your health goals. 
      <br>
      <br>
      Attached below is a registration invoice for your perusal. 
      <br>
      <br>
      <strong>Let’s Function!</strong><br>
      The Function Team
  <table style="max-width:670px;margin:50px auto 10px;background-color:#fff;padding:50px;-webkit-border-radius:3px;-moz-border-radius:3px;border-radius:3px;-webkit-box-shadow:0 1px 3px rgba(0,0,0,.12),0 1px 2px rgba(0,0,0,.24);-moz-box-shadow:0 1px 3px rgba(0,0,0,.12),0 1px 2px rgba(0,0,0,.24);box-shadow:0 1px 3px rgba(0,0,0,.12),0 1px 2px rgba(0,0,0,.24); border-top: solid 10px #1B75BC !important;">
    <thead>
      <tr>
        <th style="text-align:left;"><img style="max-width: 150px;" src="{{asset('/images/logo.png')}}" alt="function-logo"> </th>
        <th style="text-align:right;font-weight:400;">{{$data[0]['doj']}}</th>
      </tr>
    </thead>
    <tbody>
      <tr>
        <td style="height:35px;"></td>
      </tr>
      <tr>
        <td colspan="2" style="border: solid 1px #ddd; padding:10px 20px;">
          <p style="font-size:14px;margin:0 0 6px 0;"><span style="font-weight:bold;display:inline-block;min-width:150px"> Fees Status</span><b style="color:green;font-weight:normal;margin:0"> {{$data[0]['fees_status']}}</b></p>
          <p style="font-size:14px;margin:0 0 0 0;"><span style="font-weight:bold;display:inline-block;min-width:146px"> Fees Amount</span> {{$data[1]}}</p>
        </td>
      </tr>
      <tr>
        <td style="height:35px;"></td>
      </tr>
      <tr>
        <td style="width:50%;padding:20px;vertical-align:top">
          <p style="margin:0 0 10px 0;padding:0;font-size:14px;"><span style="display:block;font-weight:bold;font-size:13px">Name</span> {{$data[0]['firstName'] .' ' . $data[0]['lastName']}}</p>
          <p style="margin:0 0 10px 0;padding:0;font-size:14px;"><span style="display:block;font-weight:bold;font-size:13px;">Email</span> {{$data[0]['email']}}</p>
          <p style="margin:0 0 10px 0;padding:0;font-size:14px;"><span style="display:block;font-weight:bold;font-size:13px;">Phone</span> {{$data[0]['phoneNumber']}}</p>
        </td>
        <td style="width:50%;padding:20px;vertical-align:top">
          <p style="margin:0 0 10px 0;padding:0;font-size:14px;"><span style="display:block;font-weight:bold;font-size:13px;">Address</span> {{$data[0]['place']}}</p>
          </td>
      </tr>
      <tr>
        <td colspan="2" style="font-size:20px;padding:30px 15px 0 15px;">Particulars</td>
      </tr>
      <tr>
        <td colspan="2" style="padding:15px;">
          <p style="font-size:14px;margin:0;padding:10px;color:green; border:solid 1px #ddd;font-weight:bold;">
            <span style="display:block;font-size:13px;font-weight:normal;color:black;">New Admission </span> Rupees {{$data[1]}}
          </p>
        </td>
        
      </tr>
    </tbody>
    <tfooter>
      <tr>
        <td colspan="2" style="font-size:14px;padding:50px 15px 0 15px;">
          <strong style="display:block;margin:0 0 10px 0;">Regards</strong> Functions<br><br>
          <b>Email:</b> support@function.com
        </td>
      </tr>
    </tfooter>
  </table>
</body>

</html>