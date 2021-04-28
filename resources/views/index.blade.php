<!doctype html>
<html lang="en">
<head>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <title>Currency calculator</title>
    <link href="https://unpkg.com/tailwindcss@^2/dist/tailwind.min.css" rel="stylesheet">
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Currency converter</title>

</head>

<body class="bg-gray-100">


<div class="container mx-auto px-4">

    <div class="bg-gray-100">
        <div class="absolute top-2 right-3 h-10 w-30">
        <form action="/" method="post">
            @csrf
            <a class="text-xs  font-thin">last updated: {{$id[0]->updated_at}}</a>
            <button  class="px-4 py-2 text-xs font-semibold tracking-wider border-2 border-gray-300 rounded
            hover:bg-gray-200 text-gray-600 focus:outline-none focus:ring-2 focus:ring-gray-300"
                    type="submit" name="refresh" formmethod="post">refresh now</button>
        </form>
        </div>
    </div>

    <div class="bg-gray-100 ">
        <br>
        <h1 class="text-center text-5xl pt-12"> ♾️</h1>
        <br>
    </div>

    <div class="bg-gray-100">

        @if ($isCalculateDone == true)
            <h1 class="text-3xl  font-light text-center text-green-400">{{$post['amount']}} EUR = {{$result}} {{$post['id']}} </h1>
        @endif
        @if ($chose != '')
            <h1 class="text-3xl  font-light text-center text-green-400">EUR to {{$chose}}</h1>
        @endif
        <br>
    </div>

    <div class="bg-gray-100 flex justify-center">


        <div class="group inline-block pt-5 pr-5">
            <form action="/" method="post">
                @csrf
                <div class="flex flex-row bg-gray-200">

                    <span class="flex items-center bg-grey-lighter rounded rounded-r-none px-3 font-bold text-grey-darker">» </span>
                    <input type="text" name="search" id="search" class="bg-grey-lighter text-grey-darker py-2 font-normal rounded text-grey-darkest border border-grey-lighter rounded-l-none font-bold">
                </div>
                <input type="hidden" id="lname" name="id" value="{{$chose}}">
                <div class="">
                    <button type="submit" class="inline-block align-middle pt-2 pl-44">search</button>

                </div>
            </form>
        </div>


        <h1 class="group inline-block pt-7 pr-5">OR</h1>



        <div class="group inline-block pt-5 pr-5">
            <button
                class="outline-none focus:outline-none border px-3 py-2 bg-white rounded-sm flex items-center min-w-32"
            >
                <span class="pr-1 font-semibold flex-1">

                            @if ($chose == '')
                        Currency
                    @else
                        {{$chose}}
                    @endif

                </span>
                <span>
      <svg
          class="fill-current h-4 w-4 transform group-hover:-rotate-180
        transition duration-150 ease-in-out"
          xmlns="http://www.w3.org/2000/svg"
          viewBox="0 0 20 20"
      >
        <path
            d="M9.293 12.95l.707.707L15.657 8l-1.414-1.414L10 10.828 5.757 6.586 4.343 8z"
        />
      </svg>
    </span>
            </button>
            <ul
                class="bg-gray-100 border rounded-sm transform scale-0 group-hover:scale-100 absolute
  transition duration-150 ease-in-out origin-top min-w-32"
            >
                @foreach($id as $cur)
                    <form action="/" method="post" id="currency">
                        @csrf
                        <input type="hidden" id="currency" name="ID" value="{{$cur->ID}}">
                        <button type="submit" formmethod="post"><a><img
                                    src="https://fxtop.com/ico/{{strtolower($cur->ID)}}.gif" width="20" height="15">
                                {{$cur->ID}} - {{$cur->Rate/100000}}</a>
                        </button>
                    </form>
                @endforeach
            </ul>
        </div>


        <div class="bg-gray-100 pt-5 pl-5">
            <form action="/" method="post">
                @csrf
                <div class="flex flex-row bg-gray-200">

                <span class="flex items-center bg-grey-lighter rounded rounded-r-none px-4 font-bold text-grey-darker">»</span>
                <input type="number" name="amount" id="lname" class="bg-grey-lighter text-grey-darker py-2 font-normal rounded text-grey-darkest border border-grey-lighter rounded-l-none font-bold">
                </div>
                <input type="hidden" id="lname" name="id" value="{{$chose}}">

                <div class="">
                    <button type="submit" class="inline-block align-middle pt-2 pl-44">enter</button>

                </div>
            </form>

        </div>
    </div>

</div>



<style>

    li>ul                 { transform: translatex(100%) scale(0) }
    li:hover>ul           { transform: translatex(101%) scale(1) }
    li > button svg       { transform: rotate(-90deg) }
    li:hover > button svg { transform: rotate(-270deg) }
    .group:hover .group-hover\:scale-100 { transform: scale(1) }
    .group:hover .group-hover\:-rotate-180 { transform: rotate(180deg) }
    .scale-0 { transform: scale(0) }
    .min-w-32 { min-width: 8rem }
</style>

</body>
</html>
