@extends("layouts.Telun")
@section("content")
<x-guest-layout>

   
    
    <x-slot name="logo">
    
            
    </x-slot>
    <section id='card'>
        @php
            $count = 1; // 初期値を設定
        @endphp


    @foreach($rec_po as $rec_po)
        <tr id='op_name'>
            <td>
               <h3 id='name'> {{$rec_po->op_name}}<h3>
            </td>
            <td>
        </tr>
        <tr id='point2'>
                
                <div class="stars">
                <p id="point">
                <span>
                @for($i=0; $i<$rec_po->point; $i++)
                <input id="review01" type="radio" name="review"value="5">
                <label for="review01">★</label>
                
                @endfor
                </span>
                </div>
               
            </td>
        </tr>
        
        
        
    
    @endforeach
    </section>
</x-guest-layout>
@endsection

<style>
    body {
        background-color: #FFFFBF;
    }
    #card {
        border: double 5px #4ec4d3;
        margin: 150px auto;
        width: 60%;
        height: 80%;
        background: #fff;
        border-radius: 5px;
        overflow: scroll;
    }
    #name {
        font-size: 40px;
        padding-top: 50px;
        padding-left: 45px;
        position: absolute;
    }
    .stars span {
        color: #F8C601;
        font-size: 30px;
    }

    .stars input[type='radio'] {
        display: none;
    }

    #point {
        padding-left: 450px;
        padding-top: 70px;
    }

    #point2 {
        padding: 40px;
    }
</style>







