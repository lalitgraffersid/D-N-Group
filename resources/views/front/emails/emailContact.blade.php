@extends('front.emails.emailMaster')
@section('content')
  <tr>
    <td align="left" valign="top" style="background:#f4f4f4; border-top: 1px solid #ccc; padding:0 20px;"><table width="560" border="0" align="center" cellpadding="0" cellspacing="0">
        <tr>
          <td align="left" valign="top">&nbsp;</td>
        </tr>
        <tr>
          <td align="left" valign="top">&nbsp;</td>
        </tr>
        <tr>
          <td align="left" valign="top" style="font-family:'Arial Black', Gadget, sans-serif; font-size:15px; font-weight:600; color:#000; padding-top:10px;">Hello,</td>
        </tr>
        <tr>
          <td align="left" valign="top" style="font-family:'Arial Black', Gadget, sans-serif; font-size:15px; line-height:24px; font-weight:300; color:#000;">
          <p>New Job Application form submission given below:</p>
             @if(!empty($job))
            <p>Job Apply For : {{$job}}</p>
             @endif
            <p>Name : {{$name}}</p>
            <p>Email : {{$email}}</p>
            <p>Phone : {{$contact_no}}</p>
            <p>Subject : {{$subject}}</p>
             @if(!empty($address))
            <p>Address : {{$address}}</p>
             @endif
             @if(!empty($dob))
            <p>Dob : {{$dob}}</p>
            @endif
             @if(!empty($experience))
            <p>Experience : {{$experience}}</p>
            @endif
             @if(!empty($machine_experience))
            <p>Machine Experience : {{$machine_experience}}</p>
            @endif
            @if(!empty($your_self))
            <p>About Your Self : {{$your_self}}</p>
            @endif 
            
            </td>
        </tr>
        <tr>
          <td align="left" valign="top">&nbsp;</td>
        </tr>
        <tr>
          <td align="left" valign="top">&nbsp;</td>
        </tr>
        <tr>
          <td align="left" valign="top" style="border-top: 1px solid #737373;">&nbsp;</td>
        </tr>
        
      </table></td>
  </tr>
  <tr>
    
  </tr>

  @stop