@extends('layouts.app')

@section('heading')
    Edit Applicant
@endsection

@section('body')

<form method="POST" action="{{ route('applicants.update', $applicant->id) }}" enctype="multipart/form-data" class="space-y-8 divide-y divide-gray-200 bg-white p-8 rounded-lg">

    <div class="sm:space-y-5">

        <!-- CSRF NEEDS TO BE INCLUDED IN EVERY FORM. -->
        @csrf

        <!-- ADD THE PUT BLADE DIRECTIVE. -->
        @method('PUT')

        <div>

            <!-- HEADING INFORMATION -->
            <div>
                <h3 class="text-lg leading-6 font-medium text-gray-900">Applicant Information</h3>
                <p class="mt-1 max-w-2xl text-sm text-gray-500">You can edit the applicant's information below.</p>
            </div>

            <!-- PHOTO INPUTS -->
            <div class="py-5 mt-6 sm:mt-5 space-y-6 sm:space-y-5">
                <div class="sm:grid sm:grid-cols-3 sm:gap-4 sm:items-center sm:border-t sm:border-gray-200 sm:pt-5">
                    <label for="photo" class="block text-sm font-medium text-gray-700"> Photo </label>
                    <div class="mt-1 sm:mt-0 sm:col-span-2">
                        <div class="flex items-center">
                            <span class="h-12 w-12 rounded-full overflow-hidden bg-gray-100">
                              <img class="h-full object-cover" src="{{ asset('storage/'.$applicant->photo) }}">
                            </span>
                        <input type="file" name="photo" class="ml-5 bg-white py-2 px-3 border border-gray-300 rounded-md shadow-sm text-sm leading-4 font-medium text-gray-700 hover:bg-gray-50 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">
                        </div>
                    </div>
                </div>
            </div>

            <!-- FIRST NAME INPUT -->
            <div class="py-5 sm:grid sm:grid-cols-3 sm:gap-4 sm:items-start sm:border-t sm:border-gray-200 sm:pt-5">
                <label for="last-name" class="block text-sm font-medium text-gray-700 sm:mt-px sm:pt-2"> First name </label>
                <div class="mt-1 sm:mt-0 sm:col-span-2">
                    <input type="text" name="first_name" id="first-name" value="{{ $applicant->first_name }}" autocomplete="first-name" class="max-w-lg block w-full shadow-sm focus:ring-indigo-500 focus:border-indigo-500 sm:max-w-xs sm:text-sm border-gray-300 rounded-md">
                </div>
            </div>

            <!-- LAST NAME INPUT -->
            <div class="py-5 sm:grid sm:grid-cols-3 sm:gap-4 sm:items-start sm:border-t sm:border-gray-200 sm:pt-5">
                <label for="last-name" class="block text-sm font-medium text-gray-700 sm:mt-px sm:pt-2"> Last name </label>
                <div class="mt-1 sm:mt-0 sm:col-span-2">
                    <input type="text" name="last_name" id="last-name" value="{{ $applicant->last_name }}" autocomplete="family-name" class="max-w-lg block w-full shadow-sm focus:ring-indigo-500 focus:border-indigo-500 sm:max-w-xs sm:text-sm border-gray-300 rounded-md">
                </div>
            </div>

            <!-- EMAIL INPUT -->
            <div class="py-5 sm:grid sm:grid-cols-3 sm:gap-4 sm:items-start sm:border-t sm:border-gray-200 sm:pt-5">
                <label for="email" class="block text-sm font-medium text-gray-700 sm:mt-px sm:pt-2"> Email address </label>
                <div class="mt-1 sm:mt-0 sm:col-span-2">
                    <input id="email" name="email" type="email" value="{{ $applicant->email }}" autocomplete="email" class="block max-w-lg w-full shadow-sm focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm border-gray-300 rounded-md">
                </div>
            </div>

            <!-- PHONE -->
            <div class="py-5 sm:grid sm:grid-cols-3 sm:gap-4 sm:items-start sm:border-t sm:border-gray-200 sm:pt-5">
                <label for="phone-number" class="block text-sm font-medium text-gray-700">Phone Number</label>
                <div class="mt-1 relative rounded-md shadow-sm">
                    <div class="absolute inset-y-0 left-0 flex items-center">
                        <label for="country" class="sr-only">Country</label>
                        <select id="country" name="country" autocomplete="country" class="focus:ring-indigo-500 focus:border-indigo-500 h-full py-0 pl-3 pr-7 border-transparent bg-transparent text-gray-500 sm:text-sm rounded-md">
                            <option>NL</option>
                        </select>
                    </div>
                    <input type="text" name="phone" value="{{ $applicant->phone }}" id="phone" class="focus:ring-indigo-500 focus:border-indigo-500 block w-full pl-16 sm:text-sm border-gray-300 rounded-md" placeholder="+31 06 2885263">
                </div>
            </div>

            <!-- DATE OF BIRTH  -->
            <div class="py-5 sm:grid sm:grid-cols-3 sm:gap-4 sm:items-start sm:border-t sm:border-gray-200 sm:pt-5">
                <label for="email" class="block text-sm font-medium text-gray-700 sm:mt-px sm:pt-2"> Date of birth </label>
                <div class="mt-1 sm:mt-0 sm:col-span-2">
                    <input id="date" name="date_of_birth" type="date" value="{{ $applicant->date_of_birth }}" autocomplete="date_of_birth" class="block max-w-lg w-full shadow-sm focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm border-gray-300 rounded-md">
                </div>
            </div>

            <!-- ADDRESS -->
            <div class="py-5 sm:grid sm:grid-cols-3 sm:gap-4 sm:items-start sm:border-t sm:border-gray-200 sm:pt-5">
                <label for="street-address" class="block text-sm font-medium text-gray-700 sm:mt-px sm:pt-2"> Street address </label>
                <div class="mt-1 sm:mt-0 sm:col-span-2">
                    <input type="text" name="address" id="street-address" value="{{ $applicant->address }}" autocomplete="street-address" class="block max-w-lg w-full shadow-sm focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm border-gray-300 rounded-md">
                </div>
            </div>

            <!-- LINKEDIN PROFILE -->
            <div class="py-5 sm:grid sm:grid-cols-3 sm:gap-4 sm:items-start sm:border-t sm:border-gray-200 sm:pt-5">
                <label for="street-address" class="block text-sm font-medium text-gray-700 sm:mt-px sm:pt-2"> Linkedin URL </label>
                <div class="mt-1 sm:mt-0 sm:col-span-2">
                    <input type="text" name="linkedin_profile" id="linkedin" value="{{ $applicant->linkedin_profile }}" class="block max-w-lg w-full shadow-sm focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm border-gray-300 rounded-md">
                </div>
            </div>

            <!-- NATIONALITY INPUT -->
            <div class="sm:grid sm:grid-cols-3 sm:gap-4 sm:items-start sm:border-t sm:border-gray-200 sm:pt-5">
                <label for="country" class="block text-sm font-medium text-gray-700 sm:mt-px sm:pt-2"> Nationality </label>
                <div class="mt-1 sm:mt-0 sm:col-span-2">
                <select id="nationality" name="nationality" autocomplete="nationality" class="max-w-lg block focus:ring-indigo-500 focus:border-indigo-500 w-full shadow-sm sm:max-w-xs sm:text-sm border-gray-300 rounded-md">
                    <!-- SET THE DROPDOWN SELECTED STATE THAT IS SHOWN ON PAGE LOAD BASED ON THE NATIONALITY. -->
                    <option @if($applicant->nationality == "Dutch") selected @endif>Dutch</option>
                    <option @if($applicant->nationality == "Other") selected @endif>Other</option>
                </select>
                </div>
            </div>

    </div>

    <div class="pt-5">
        <div class="flex justify-end">
          <a href="{{ url()->previous() }}" class="bg-white py-2 px-4 border border-gray-300 rounded-md shadow-sm text-sm font-medium text-gray-700 hover:bg-gray-50 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">Cancel</a>
          <button type="submit" class="ml-3 inline-flex justify-center py-2 px-4 border border-transparent shadow-sm text-sm font-medium rounded-md text-white bg-indigo-600 hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">Update</button>
        </div>
    </div>

</form>

<div>
    <h3 class="text-lg leading-6 font-medium text-gray-900">Skills</h3>
    <p class="mt-1 max-w-2xl text-sm text-gray-500">You can edit the applicant's information below.</p>
</div>

<!-- This example requires Tailwind CSS v2.0+ -->
<div>
  <div class="sm:flex sm:items-center">
    <div class="sm:flex-auto">
      <h1 class="text-xl font-semibold text-white">Skills</h1>
      <p class="mt-2 text-sm text-white">A list of all the skills of the applicant.</p>
    </div>
    <div class="mt-4 sm:mt-0 sm:ml-16 sm:flex-none">
      <a href="{{ route('skills.create') }}" class="inline-flex items-center justify-center rounded-md border border-transparent bg-indigo-600 px-4 py-2 text-sm font-medium text-white shadow-sm hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2 sm:w-auto">Add Applicant</a>
    </div>
  </div>
  <div class="mt-8 flex flex-col">
    <div class="-my-2 -mx-4 overflow-x-auto sm:-mx-6 lg:-mx-8">
      <div class="inline-block min-w-full py-2 align-middle md:px-6 lg:px-8">
        <div class="overflow-hidden shadow ring-1 ring-black ring-opacity-5 md:rounded-lg">
          <table class="min-w-full divide-y divide-gray-300">
            <thead class="bg-gray-50">
              <tr>
                <th scope="col" class="py-3.5 pl-4 pr-3 text-left text-sm font-semibold text-gray-900 sm:pl-6">Label</th>
                <th scope="col" class="px-3 py-3.5 text-left text-sm font-semibold text-gray-900">Rating</th>
                <th scope="col" class="relative py-3.5 pl-3 pr-4 sm:pr-6">
                  <span class="sr-only">Edit</span>
                </th>
              </tr>
            </thead>
            <tbody class="divide-y divide-gray-200 bg-white">
                @foreach($applicant->skills as $skill)
                <tr>
                  <td class="whitespace-nowrap py-4 pl-4 pr-3 text-sm font-medium text-gray-900 sm:pl-6">{{ $skill->label }}</td>
                  <td class="whitespace-nowrap px-3 py-4 text-sm text-gray-500">{{ $skill->rating }}</td>
                  <td class="relative whitespace-nowrap py-4 pl-3 pr-4 text-right text-sm font-medium sm:pr-6">
                    <form action="{{ route('skills.destroy', $applicant->id) }}" method="POST">
                    <!-- SHOW BUTTON -->
                    <a href="{{ route('skills.show', $applicant->id) }}" class="text-indigo-600 hover:text-indigo-900 mr-4">Details</a>
                    <!-- EDIT BUTTON -->
                    <a href="{{ route('skills.edit', $applicant->id) }}" class="text-indigo-600 hover:text-indigo-900 mr-4">Edit</a>
                    <!-- DELETE BUTTON -->
                    @method('DELETE')
                    @csrf
                    <button type="submit" class="text-indigo-600 hover:text-indigo-900 mr-4">Delete</button>
                    </form>
                  </td>
                </tr>
                @endforeach
            </tbody>
          </table>
        </div>
      </div>
    </div>
  </div>
</div>

@endsection
