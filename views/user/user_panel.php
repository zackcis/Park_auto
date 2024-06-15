<?php
include_once '../../routes/authCheck.php';
authCheck();
include_once '../includes/header.php';
?>


<div class="w-full flex flex-col justify-center items-center">
    <h1 class="text-center my-5 text-4xl font-bold">User Panel</h1>

    <table class="border-collapse w-[80%]">
        <thead>
            <tr>
                <th class="p-3 font-bold uppercase bg-gray-200 text-gray-600 border border-gray-300 hidden lg:table-cell">Model</th>
                <th class="p-3 font-bold uppercase bg-gray-200 text-gray-600 border border-gray-300 hidden lg:table-cell">Mark</th>
                <th class="p-3 font-bold uppercase bg-gray-200 text-gray-600 border border-gray-300 hidden lg:table-cell">Status</th>
                <th class="p-3 font-bold uppercase bg-gray-200 text-gray-600 border border-gray-300 hidden lg:table-cell">Actions</th>
            </tr>
        </thead>
        <tbody>
            <tr class="bg-white lg:hover:bg-gray-100 flex lg:table-row flex-row lg:flex-row flex-wrap lg:flex-no-wrap mb-10 lg:mb-0">
                <? foreach ($cars as $car) : ?>
                    <td class="w-full lg:w-auto p-3 text-gray-800 text-center border border-b block lg:table-cell relative lg:static">
                        <span class="lg:hidden absolute top-0 left-0 bg-blue-200 px-2 py-1 text-xs font-bold uppercase">Company name</span>
                        KnobHome
                    </td>
                    <td class="w-full lg:w-auto p-3 text-gray-800 text-center border border-b  block lg:table-cell relative lg:static">
                        <span class="lg:hidden absolute top-0 left-0 bg-blue-200 px-2 py-1 text-xs font-bold uppercase">Country</span>
                        German
                    </td>
                    <td class="w-full lg:w-auto p-3 text-gray-800  border border-b text-center block lg:table-cell relative lg:static">
                        <span class="lg:hidden absolute top-0 left-0 bg-blue-200 px-2 py-1 text-xs font-bold uppercase">Status</span>
                        <span class="rounded bg-red-400 py-1 px-3 text-xs font-bold">deleted</span>
                    </td>
                    <td class="w-full lg:w-auto p-3 text-gray-800  border border-b text-center block lg:table-cell relative lg:static">
                        <span class="lg:hidden absolute top-0 left-0 bg-blue-200 px-2 py-1 text-xs font-bold uppercase">Actions</span>
                        <a href="#" class="text-blue-400 hover:text-blue-600 underline">Edit</a>
                        <a href="#" class="text-blue-400 hover:text-blue-600 underline pl-6">Remove</a>
                    </td>
                <?php endforeach ?>
            </tr>
        </tbody>
    </table>
</div>

<!-- component -->