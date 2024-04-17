<x-mail::message>
Hey {{ $data['your_name'] }},

Hope you're doing well! I just wanted to drop a quick note to say that I'm thrilled to recommend you for the "{{ $data['job'] }}" position with Us. Your skills are impressive and would be a great fit.

Feel free to Join Us. Rooting for you!

Best,Regards.



<x-mail::button :url="$data['job']">
Job link
</x-mail::button>

Thanks,<br>

</x-mail::message>
