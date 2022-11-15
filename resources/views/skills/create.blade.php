@extends('layouts.app')

@section('heading')
    Create Skill
@endsection

@section('body')

<form method="POST" action="{{ route('skills.store') }}" class="space-y-8 divide-y divide-gray-200 bg-white p-8 rounded-lg">

    <div class="sm:space-y-5">

        <!-- CSRF NEEDS TO BE INCLUDED IN EVERY FORM. -->
        @csrf

        <div>

            <!-- HEADING INFORMATION -->
            <div>
                <h3 class="text-lg leading-6 font-medium text-gray-900">Skill Information</h3>
                <p class="mt-1 max-w-2xl text-sm text-gray-500">You can enter the applicant's information here.</p>
            </div>

            <!-- LABEL INPUT FIELD -->
            <div class="py-5 sm:grid sm:grid-cols-3 sm:gap-4 sm:items-start sm:border-t sm:border-gray-200 sm:pt-5">
                <label for="last-name" class="block text-sm font-medium text-gray-700 sm:mt-px sm:pt-2"> Label </label>
                <div class="mt-1 sm:mt-0 sm:col-span-2">
                    <input type="text" name="label" id="label" class="max-w-lg block w-full shadow-sm focus:ring-indigo-500 focus:border-indigo-500 sm:max-w-xs sm:text-sm border-gray-300 rounded-md">
                </div>
            </div>

            <!-- FIRST NAME INPUT -->
            <div class="py-5 sm:grid sm:grid-cols-3 sm:gap-4 sm:items-start sm:border-t sm:border-gray-200 sm:pt-5">
                <label for="last-name" class="block text-sm font-medium text-gray-700 sm:mt-px sm:pt-2"> Rating </label>
                <div class="mt-1 sm:mt-0 sm:col-span-2">
                    <input type="number" value="1" min="1" max="5" name="rating" id="rating" class="max-w-lg block w-full shadow-sm focus:ring-indigo-500 focus:border-indigo-500 sm:max-w-xs sm:text-sm border-gray-300 rounded-md">
                </div>
            </div>



    </div>

    <div class="pt-5">
        <div class="flex justify-end">
          <a href="{{ url()->previous() }}" class="bg-white py-2 px-4 border border-gray-300 rounded-md shadow-sm text-sm font-medium text-gray-700 hover:bg-gray-50 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">Cancel</a>
          <button type="submit" class="ml-3 inline-flex justify-center py-2 px-4 border border-transparent shadow-sm text-sm font-medium rounded-md text-white bg-indigo-600 hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">Save</button>
        </div>
    </div>

</form>


@endsection
