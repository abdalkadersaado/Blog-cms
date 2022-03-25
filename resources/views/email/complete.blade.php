@component('mail::message')
# Subscription Complated Successfully
<p>We will create an account in order for you to get our best services</p>
<p>so , We hope you will wait while we update you with an account on our platform</p>

{{-- @component('mail::button', ['url' => ''])
Visit Our Site
@endcomponent --}}

Thanks,<br>
{{ config('app.name') }}
@endcomponent
