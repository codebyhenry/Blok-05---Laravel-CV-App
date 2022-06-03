@extends('layouts.app')

@section('heading')
    Dashboard
@endsection

@section('body')

    <!-- IGNORE THIS - IAM INCLUDING A HEADING WITH SOME EXPLANATION. -->
    @include('partials.basic-workflow-explanation')

    <!-- This example requires Tailwind CSS v2.0+ -->
    <div>
      <div class="sm:flex sm:items-center">
        <div class="sm:flex-auto">
          <h1 class="text-xl font-semibold text-white">Applicants</h1>
          <p class="mt-2 text-sm text-white">A list of all the applicants displayed on a dashboard including first name, last name, email and phone.</p>
        </div>
        <div class="mt-4 sm:mt-0 sm:ml-16 sm:flex-none">
          <a href="{{ route('applicants.create') }}" class="inline-flex items-center justify-center rounded-md border border-transparent bg-indigo-600 px-4 py-2 text-sm font-medium text-white shadow-sm hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2 sm:w-auto">Add Applicant</a>
        </div>
      </div>
      <div class="mt-8 flex flex-col">
        <div class="-my-2 -mx-4 overflow-x-auto sm:-mx-6 lg:-mx-8">
          <div class="inline-block min-w-full py-2 align-middle md:px-6 lg:px-8">
            <div class="overflow-hidden shadow ring-1 ring-black ring-opacity-5 md:rounded-lg">
              <table class="min-w-full divide-y divide-gray-300">
                <thead class="bg-gray-50">
                  <tr>
                    <th scope="col" class="py-3.5 pl-4 pr-3 text-left text-sm font-semibold text-gray-900 sm:pl-6">First Name</th>
                    <th scope="col" class="px-3 py-3.5 text-left text-sm font-semibold text-gray-900">Last Name</th>
                    <th scope="col" class="px-3 py-3.5 text-left text-sm font-semibold text-gray-900">Email</th>
                    <th scope="col" class="px-3 py-3.5 text-left text-sm font-semibold text-gray-900">Phone</th>
                    <th scope="col" class="relative py-3.5 pl-3 pr-4 sm:pr-6">
                      <span class="sr-only">Edit</span>
                    </th>
                  </tr>
                </thead>
                <tbody class="divide-y divide-gray-200 bg-white">
                    @foreach($applicants as $applicant)
                    <tr>
                      <td class="whitespace-nowrap py-4 pl-4 pr-3 text-sm font-medium text-gray-900 sm:pl-6">{{ $applicant->first_name }}</td>
                      <td class="whitespace-nowrap px-3 py-4 text-sm text-gray-500">{{ $applicant->last_name }}</td>
                      <td class="whitespace-nowrap px-3 py-4 text-sm text-gray-500">{{ $applicant->email }}</td>
                      <td class="whitespace-nowrap px-3 py-4 text-sm text-gray-500">{{ $applicant->phone }}</td>
                      <td class="relative whitespace-nowrap py-4 pl-3 pr-4 text-right text-sm font-medium sm:pr-6">
                        <form action="{{ route('applicants.destroy', $applicant->id) }}" method="POST">
                        <!-- SHOW BUTTON -->
                        <a href="{{ route('applicants.show', $applicant->id) }}" class="text-indigo-600 hover:text-indigo-900 mr-4">Details</a>
                        <!-- EDIT BUTTON -->
                        <a href="{{ route('applicants.edit', $applicant->id) }}" class="text-indigo-600 hover:text-indigo-900 mr-4">Edit</a>
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
