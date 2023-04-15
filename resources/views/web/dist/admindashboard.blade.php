<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta http-equiv="X-UA-Compatible" content="IE=edge" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Administrator - Dashboard</title>
  <!-- output css file -->
  <link rel="stylesheet" href="{{ asset('css/output.css') }}" />
  <!-- fonts cdn -->
  <link rel="preconnect" href="https://fonts.googleapis.com" />
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
  <link href="https://fonts.googleapis.com/css2?family=Red+Hat+Display:ital,wght@0,400;0,500;0,600;0,700;0,800;0,900;1,400&display=swap" rel="stylesheet" />
  <!-- tailwindcss cdn -->
  <script src="https://cdn.tailwindcss.com"></script>
  <style>
    body {
      font-family: "Red Hat Display", sans-serif;
      padding: 0;
      margin: 0;
    }
  </style>
</head>

<body class="bg-[#fafafa] w-[80%] mx-auto">

  <!-- dashboard body -->
  <div class="grid grid-cols-12 gap-5">


    <!-- sidebar -->
    <div class="col-span-1 bg-admin rounded-[30px] shadow-vague h-[98vh] my-auto">



      <div class="icons flex flex-col mt-10">

        <!-- logo -->
        <img src="../images/small-logo.svg" alt="small logo" class="w-8 m-auto">



        <div class="other-icons mt-2 my-auto">

          <!-- dashboard icon -->
          <a href="">
            <div class="mt-12 px-2 py-4 bg-sky-100/30 w-10/12 m-auto rounded-xl ">
              <img src="../images/admin-icons/dashboard.svg" class="m-auto" alt="dashboard-icon">
            </div>
          </a>

          <!-- all applications icon -->
          <a href="">
            <div class="mt-8">
              <img src="../images/admin-icons/all-applications.svg" class="m-auto" alt="dashboard-icon">
            </div>
          </a>

          <!-- rejected applications icon -->
          <a href="">
            <div class="mt-8">
              <img src="../images/admin-icons/rejected-applications.svg" class="m-auto" alt="dashboard-icon">
            </div>
          </a>

          <!-- approved applications icon -->
          <a href="">
            <div class="mt-8">
              <img src="../images/admin-icons/approved-applications.svg" class="m-auto" alt="dashboard-icon">
            </div>
          </a>

        </div>

        <!-- logout icon -->
        <a href="/logout">
          <div class="mt-52 m-auto">
            <img src="../images/dashboard-icons/log-out.svg" class="m-auto" alt="dashboard-icon">
          </div>
        </a>


      </div>
    </div>



    <!-- end of sidebar -->



    <div class="col-span-11 gap-16 p-2 h-screen overflow-y-scroll">
      <!-- main content -->
      <main>

        <!-- navbar -->
        <div class="grid grid-row-1 row-span-full bg-white p-4 rounded-[30px] shadow-vague">
          <div class="flex justify-between">
            <!-- dashboard text -->
            <div class="my-auto">
              <h1 class="text-2xl font-semibold opacity-60 tracking-tighter">
                Administrator
              </h1>
            </div>

            <!-- navbar options/ icons -->
            <div class="flex flex-wrap space-x-6">
              <!-- messages -->
              <button class="border relative border-slate-200 rounded-full p-3">
                <div class="blue-dot absolute p-1 bg-neutral-900 rounded-full top-0 right-2"></div>
                <img src="../images/admin-icons/message.svg" alt="" />
              </button>
              <!-- notifications -->

              <button class="border border-slate-200 rounded-full p-3">
                <img src="../images/admin-icons/notification.svg" alt="" />
              </button>

              <!-- profile -->
              <div class="">
                <img src="../images/user.jpg" class="h-12 w-12 object-cover rounded-full" alt="user-image" />
              </div>
            </div>
            <!-- end of navbar options -->

          </div>
        </div>
        <!-- end of navbar -->

      </main>

      <!-- application -->
      <div class="grid grid-cols-11 gap-4 mt-4">

        <!-- col 1 (applications) -->
        <div class="col-span-7 bg-white shadow-vague rounded-[30px] p-8">

          <!-- application heading -->
          <div class="flex flex-row my-auto">

            <!-- heading -->
            <div class="">
              <h1 class="text-xl font-bold">All Applications</h1>
              <p class="text-sm text-gray-400 mt-2 w-9/12">
                All submitted will be visible here and will be marked
                as pending until Approved or Declined by the Admin.
              </p>
            </div>
            <!-- end of heading -->

            <!-- button -->
            <div class="w-3/12 my-auto">
              <a href="{{ route('admin.all') }}">
                <button class="bg-admin text-white px-8 py-3 rounded-full">View all</button>
              </a>
            </div>

          </div>

          <!-- an applicant 1 -->
          @foreach ($data as $info)
          <div class="flex gap-4 mt-6 p-3 rounded-xl border border-slate-200">
            <!-- picture -->
            <div class="picture my-auto bg-zinc-200 w-20 rounded-md h-16"></div>

            <!-- name/text container -->
            <div class="grid grid-cols-2 w-full">

              <!-- name con -->
              <div class="justify-self-start name-con my-auto">
                <p class="text-sm font-bold"> <a href="applicationdetails/{{ $info->id }}">{{ $info->fullname }}</a></p>
                <p class="text-xs mt-2 font-medium"> {{ $info->course }}</p>
              </div>

              <!-- details con -->
              <div class="name-con justify-self-end mr-4 text-right my-auto">
                <p class="text-xs text-zinc-300"> {{ $info->created_at }}</p>
                @if ($info->application_status == "pending")
                <div class="badge mt-2 bg-gray-100 text-gray-500 px-6 py-2.5 font-semibold rounded-full w-full text-1xl">
                  {{ $info->application_status }}
                </div>
                @endif

                @if ($info->application_status == "approved")
                <div class="badge mt-2 bg-green-100 text-green-500 px-6 py-2.5 font-semibold rounded-full w-full text-1xl">
                  {{ $info->application_status }}
                </div>
                @endif

                @if ($info->application_status == "declined")
                <div class="badge mt-2 bg-red-100 text-red-500 px-6 py-2.5 font-semibold rounded-full w-full text-1xl">
                  {{ $info->application_status }}
                </div>
                @endif
              </div>


            </div>
          </div>
          @endforeach
          <!-- all applicant 1 -->




        </div>

        <!-- col 2 (deleted applications) -->
        <div class="col-span-4 bg-white rounded-[30px] shadow-vague p-5">
          <!-- heading -->
          <div class="headingg flex justify-between w-full">
            <div class="text">
              <div class="mt-6">
                <h1 class="text-md font-semibold text-red-500">Declined Applications</h1>
                <p class="text-xs text-gray-400 mt-1 w-10/12">
                  All declined applications will be visible here.
                </p>
              </div>
            </div>

            <!-- btn -->
            <div class="my-auto">
              <a href="">
                <button class="bg-gray-100 text-gray-500 text-sm py-2.5 px-5 rounded-full">View All</button>
              </a>
            </div>
          </div>
          <!-- end of heading -->


          <!-- deleted applications -->


          <!-- a deleted applicant 1 -->
          @foreach ($declined as $dec)
          <div class="flex gap-4 mt-6 p-2 rounded-lg border border-slate-200">
            <!-- picture -->
            <div class="picture my-auto bg-zinc-200 w-16 rounded-md h-14"></div>

            <!-- name/text container -->
            <div class="grid row-span-full">

              <!-- name con -->
              <div class="justify-self-start name-con my-auto">
                <p class="text-xs font-bold"> {{ $dec->fullname }} </p>
                <p class="text-[0.55rem] mt-1"> {{ $dec->course }} </p>
              </div>
            </div>
          </div>
          @endforeach
          <!-- end of all deleted applicants -->

        </div>
        <!-- end of heading -->




      </div>



    </div>

  </div>


  <!-- end of dashboard body -->
</body>

</html>