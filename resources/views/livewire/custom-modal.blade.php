
<template x-if="true">
<div>
  <x-modal wire:model="show">


<div class="block p-6 rounded-lg shadow-lg bg-white w-full">

  <h1 class="text-2xl font-bold text-center my-3"> Add Expenses</h1>
    <form method="POST" action="{{ route('admin.transaction.expenses.store') }}">
       @csrf
    <div class="form-group mb-6">
       <label for="exampleInputEmail2" class="form-label inline-block mb-2 text-gray-700 mt-5 text-xl">Price</label>
      <input type="text" name='amount' class="form-control block 
        w-full
        px-3
        py-1.5
        text-base
        font-normal
        text-gray-700
        bg-white bg-clip-padding
        border border-solid border-gray-300
        rounded
        transition
        ease-in-out
        m-0
        focus:text-gray-700 focus:bg-white focus:border-blue-600 focus:outline-none" id="exampleInput7"
        placeholder="Expense Price">
    </div>
    <div class="form-group mb-6">
       <label for="exampleInputEmail2" class="form-label inline-block mb-2 text-gray-700 mt-5 text-xl">Name</label>
      <input type="text" name="expense_type" class="form-control block
        w-full
        px-3
        py-1.5
        text-base
        font-normal
        text-gray-700
        bg-white bg-clip-padding
        border border-solid border-gray-300
        rounded
        transition
        ease-in-out
        m-0 h-14
        focus:text-gray-700 focus:bg-white focus:border-blue-600 focus:outline-none" id="exampleInput8"
        placeholder="Expense Name ">
    </div>
    <div class="flex space-x-6">
      <button type="submit" class="
      w-1/2
      px-6
      py-2.5
      bg-blue-600
      text-white
      font-medium
      text-xs
      leading-tight
      uppercase
      rounded
      shadow-md
      hover:bg-blue-700 hover:shadow-lg
      focus:bg-blue-700 focus:shadow-lg focus:outline-none focus:ring-0
      active:bg-blue-800 active:shadow-lg
      transition
      duration-150
      ease-in-out">Submit</button>
      <button type="submit" x-on:click="show = false" class="inline-block   w-1/2 px-6 py-2.5 bg-red-600 text-white font-medium text-xs leading-tight uppercase rounded shadow-md hover:bg-red-700 hover:shadow-lg focus:bg-red-700 focus:shadow-lg focus:outline-none focus:ring-0 active:bg-red-800 active:shadow-lg transition duration-150 ease-in-out">Cancel</button>
    </div>
  
  </form>
</div>

  </x-modal>
</div>
</template>
