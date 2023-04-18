@extends('adminlte::page')

@section('content')

@vite('resources/css/app.css')
<form action="{{route('admin.requests.store')}}" method="POST">
    @csrf
    <div class="space-y-12">
        <div class="sm:col-span-3">
            <label for="country" class="block text-sm font-medium leading-6 text-gray-900">Transfer Type</label>
            <div class="mt-2">
                <select name="transType" class="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:max-w-xs sm:text-sm sm:leading-6">
                    <option value="">Choose Tranfer Type </option>
                    <option value="TAB">Basic Transfer</option>
                    <option value="TAM">Medical Transfer</option>
                </select>
            </div>
        </div>

        <div class="border-b border-gray-900/10 pb-12">

        <div class="mt-10 grid grid-cols-1 gap-x-6 gap-y-8 sm:grid-cols-6">

            <div class="md:col-span-6">
              <label for="first-name" class="block text-sm font-medium leading-6 text-gray-900">Name</label>
              <div class="mt-2">
                <input type="text" name="patientName" class="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6">
              </div>
            </div>

            <div class="sm:col-span-6">
                <label for="first-name" class="block text-sm font-medium leading-6 text-gray-900">C.C.</label>
                <div class="mt-">
                  <input type="number" name="identification" id="first-name" autocomplete="given-name" class="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6">
                </div>
            </div>

            <div class="sm:col-span-6">
                <label for="country" class="block text-sm font-medium leading-6 text-gray-900">Document Type</label>
                <div class="mt-2">
                  <select id="country" name="docType" autocomplete="country-name" class="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:max-w-xs sm:text-sm sm:leading-6">
                    <option value="">Choosse documenttype </option>
                        <option value="CC">CC - CITIZENSHIP CARD</option>
                        <option value="CE">CE - FOREIGNER ID</option>
                        <option value="PA">PA - PASSPORT</option>
                        <option value="NUIP">NUIP - UNIQUE PERSONAL IDENTIFICATION NUMBER</option>
                        <option value="PE">PE - SPECIAL RESIDENCE PERMIT</option>
                  </select>
                </div>
              </div>

              <div class="sm:col-span-3">
                <label for="country" class="block text-sm font-medium leading-6 text-gray-900">Gender</label>
                <div class="mt-2">
                    <select id="country" name="gender" class="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:max-w-xs sm:text-sm sm:leading-6">
                        <option value="">Choose Gender</option>
                        <option value="male">Male</option>
                        <option value="female">Female</option>
                    </select>
                </div>
            </div>

            <div class="row">
                <div class="col">
                    <label class="block text-sm font-medium leading-6 text-gray-900">From</label>
                    <div class="mt-2">
                      <input type="text" name="from" class="block rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6">
                    </div>
                  </div>

                  <div class="col">
                    <label class="block text-sm font-medium leading-6 text-gray-900">To</label>
                    <div class="mt-2">
                      <input type="text" name="to" class="block rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6">
                    </div>
                  </div>
            </div>

            <div class="sm:col-span-2 sm:col-start-1">
              <label for="city" class="block text-sm font-medium leading-6 text-gray-900">City</label>
              <div class="mt-2">
                <input type="text" name="city" class="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6">
              </div>
            </div>

            <div class="row">
                <div class="relative" data-te-input-wrapper-init>
                    <input type="time" name="hour" class="peer block rounded border-1 bg-transparent px-3 py-[0.32rem] leading-[1.6] outline-none transition-all duration-200 ease-linear focus:placeholder:opacity-100 peer-focus:text-primary data-[te-input-state-active]:placeholder:opacity-100 motion-reduce:transition-none dark:text-neutral-200 dark:placeholder:text-neutral-200 dark:peer-focus:text-primary [&:not([data-te-input-placeholder-active])]:placeholder:opacity-0" />
                </div>

                <div class="relative" data-te-input-wrapper-init>
                    <input type="date" name="date" class="peer block rounded border-1 bg-transparent px-3 py-[0.32rem] leading-[1.6] outline-none transition-all duration-200 ease-linear focus:placeholder:opacity-100 peer-focus:text-primary data-[te-input-state-active]:placeholder:opacity-100 motion-reduce:transition-none dark:text-neutral-200 dark:placeholder:text-neutral-200 dark:peer-focus:text-primary [&:not([data-te-input-placeholder-active])]:placeholder:opacity-0" />
                </div>
            </div>
          </div>
        </div>

        <div class="mt-10">
            <legend class="text-sm font-semibold leading-6 text-gray-900">Accompanions</legend>

            <div class="form-check">
                <input class="form-check-input" type="radio" name="accompanions" id="flexRadioDefault1" value="yes">
                <label class="form-check-label" for="flexRadioDefault1">
                  Yes
                </label>
              </div>
              <div class="form-check">
                <input class="form-check-input" type="radio" name="accompanions" id="flexRadioDefault2" value="not">
                <label class="form-check-label" for="flexRadioDefault2">
                  Not
                </label>
              </div>
      </div>
    </div>

    <div class="mt-6 flex items-center justify-end gap-x-6">
      <button type="button" class="text-sm font-semibold leading-6 text-gray-900">Cancel</button>
      <button type="submit" class="rounded-md bg-indigo-600 px-3 py-2 text-sm font-semibold text-white shadow-sm hover:bg-indigo-500 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-indigo-600">Save</button>
    </div>
  </form>

@endsection
