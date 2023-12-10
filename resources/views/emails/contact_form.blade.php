
<p>Dear {{ config('app.name') }} Team,
</p>
<p>I hope this email finds you well. I wanted to bring to your attention that we have received a contact form submission from a potential client. Please find the details below:
</p>
<p>Company Name: {{ $formData['company_name'] }}</p>
<p>First Name: {{ $formData['first_name'] }}</p>
<p>Last Name: {{ $formData['last_name'] }}</p>
<p>Email: {{ $formData['email'] }}</p>
<p>How can we help: {{ $formData['how_can_we_help'] }}</p>
<p>Tell us more: {{ $formData['tell_us_more'] }}</p>
<p>Budget: {{ $formData['budget'] }}</p>
<p>How did you hear about us: {{ $formData['how_did_you_hear_about_us'] }}</p>

<p>We kindly request your prompt attention to this inquiry. It would be greatly appreciated if you could review the information provided and reach out to the client at your earliest convenience. Please ensure that you address their questions or concerns appropriately.
</p>

<p>If you require any further information or assistance, please do not hesitate to contact me directly at {{ $formData['email'] }}.
</p>

<p>Thank you for your attention to this matter.
</p>
<p>Best regards,
</p>


