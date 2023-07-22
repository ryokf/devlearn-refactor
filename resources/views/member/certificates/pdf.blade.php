<!doctype html>
<html>

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <style>
        /* Global Styles */
        html {
            font-size: 16px;
        }

        body {
            margin: 0;
            padding: 0;
            font-family: serif;
            background-color: #f7fafc;
            color: #000;
        }

        .container {
            max-width: 100%;
            margin-left: auto;
            margin-right: auto;
            padding-left: 1rem;
            padding-right: 1rem;
        }

        /* Custom Styles */
        .bg-primary {
            background-color: #E8E8E8;
            /* Updated to use the color slate-800 */
        }

        .text-primary {
            color: #2d3748;
            /* Updated to use the color gray-800 */
        }

        .border-primary {
            border-color: #2d3748;
            /* Updated to use the color gray-800 */
        }

        .border {
            border: 1px solid #000;
        }

        .border-8 {
            border-width: 8px;
        }

        .flex {
            display: flex;
        }

        .justify-center {
            justify-content: center;
        }

        .items-center {
            align-items: center;
        }

        .h-[80%] {
            height: 80%;
        }

        .text-tan {
            color: #d1bfa0;
        }

        .text-black {
            color: #000;
        }

        .text-center {
            text-align: center;
        }

        .text-5xl {
            font-size: 3rem;
        }

        .text-bluegray-700 {
            color: #4a5568;
        }

        .text-teal-500 {
            color: #237AAD;
        }

        .text-6xl {
            font-size: 3.5rem;
        }

        .text-4xl {
            font-size: 2.25rem;
        }

        .mb-8 {
            margin-bottom: 2rem;
        }

        .text-italic {
            font-style: italic;
        }

        .w-96 {
            width: 24rem;
        }

        .mx-auto {
            margin-left: auto;
            margin-right: auto;
        }

        /* Additional Styles */
        .border-b-2 {
            border-bottom-width: 2px;
        }
    </style>
</head>

<body>
    <div class="bg-primary border border-primary border-8">
        <div class="container mx-auto p-5 flex justify-center items-center h-[80%]">
            <div class=" font-serif text-black text-center">
                <div class=" text-5xl mb-8">
                    <p class="">DEV<span class="text-teal-500">LEARN</span></p>
                </div>

                <div class=" text-6xl mb-8">
                    Certificate of Completion
                </div>
                <div class=" text-4xl mb-8">
                    {{ $certificate->course->title }}
                </div>

                <div class="mb-8">
                    This certificate is presented to
                </div>

                <div class="border-b-2 border-black text-4xl italic mb-8 w-96 mx-auto">
                    <i>{{ $certificate->user->username }}</i>
                    <hr>
                </div>

                <div class="mb-8">
                    Completion Time : {{ $certificate->created_at }}
                </div>

            </div>
        </div>
    </div>
</body>

</html>
