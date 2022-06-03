@extends('layouts.app')

@section('heading')
    Details
@endsection

@section('body')

<!-- This example requires Tailwind CSS v2.0+ -->
<div class="bg-white shadow overflow-hidden sm:rounded-lg">
<div class="px-4 py-5 sm:px-6">
<h3 class="text-lg leading-6 font-medium text-gray-900">Applicant Information</h3>
<p class="mt-1 max-w-2xl text-sm text-gray-500">Personal details and application.</p>
</div>
<div class="border-t border-gray-200 px-4 py-5 sm:p-0">
<dl class="sm:divide-y sm:divide-gray-200">
  <div class="py-4 sm:py-5 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-6">
    <dt class="text-sm font-medium text-gray-500">Full name</dt>
    <dd class="mt-1 text-sm text-gray-900 sm:mt-0 sm:col-span-2">{{ $applicant->first_name }} {{ $applicant->last_name }}</dd>
  </div>
  <div class="py-4 sm:py-5 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-6">
     <label for="photo" class="block text-sm font-medium text-gray-700"> Photo </label>
     <div class="mt-1 sm:mt-0 sm:col-span-2">
       <div class="flex items-center">
       <span class="h-12 w-12 rounded-full overflow-hidden bg-gray-100">
         <img class="h-full object-cover" src="{{ $applicant->photo }}">
       </span>
      </div>
     </div>
   </div>
  <div class="py-4 sm:py-5 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-6">
    <dt class="text-sm font-medium text-gray-500">Address</dt>
    <dd class="mt-1 text-sm text-gray-900 sm:mt-0 sm:col-span-2">{{ $applicant->address }}</dd>
  </div>
  <div class="py-4 sm:py-5 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-6">
    <dt class="text-sm font-medium text-gray-500">Phone</dt>
    <dd class="mt-1 text-sm text-gray-900 sm:mt-0 sm:col-span-2">{{ $applicant->phone }}</dd>
  </div>
  <div class="py-4 sm:py-5 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-6">
    <dt class="text-sm font-medium text-gray-500">Email</dt>
    <dd class="mt-1 text-sm text-gray-900 sm:mt-0 sm:col-span-2">{{ $applicant->email}}</dd>
  </div>
  <div class="py-4 sm:py-5 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-6">
    <dt class="text-sm font-medium text-gray-500">Date of birth</dt>
    <dd class="mt-1 text-sm text-gray-900 sm:mt-0 sm:col-span-2">{{ $applicant->date_of_birth }}</dd>
  </div>
  <div class="py-4 sm:py-5 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-6">
    <dt class="text-sm font-medium text-gray-500">Nationality</dt>
    <dd class="mt-1 text-sm text-gray-900 sm:mt-0 sm:col-span-2">{{ $applicant->nationality }}</dd>
  </div>
  <div class="py-4 sm:py-5 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-6">
    <dt class="text-sm font-medium text-gray-500">Linkedin URL</dt>
    <dd class="mt-1 text-sm text-gray-900 sm:mt-0 sm:col-span-2"><a href="{{ $applicant->linkedin_profile }}" _target="blank">visit linkedin profile</a></dd>
  </div>
</dl>
</div>
</div>


@endsection
