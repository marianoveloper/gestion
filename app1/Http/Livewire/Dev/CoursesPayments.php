<?php

namespace App\Http\Livewire\Dev;

use App\Models\Course;
use App\Models\Payment;
use Livewire\Component;

class CoursesPayments extends Component
{
    public $course,$payment,$price,$status_price,$quota;

    protected $rules=[
        'payment.price'=>'required',
        'payment.status_price'=>'required',
        'payment.quota'=>'required',


    ];

    public function mount(Course $course){
        $this->course=$course;
        $this->payment=new Payment();

    }

    public function render()
    {

        return view('livewire.dev.courses-payments');
    }

    public function store(){

        $this->validate([
            'price'=> 'required',
            'status_price'=>'required',
            'quota'=>'required',


        ]);

        $this->course->payments()->create([

            'price' => $this->price,
            'status_price'=>$this->status_price,
            'quota'=>$this->quotas,


        ]);

        $this->reset(['price','status_price','quotas']);
        $this->course= Course::find($this->course->id);
    }

    public function edit(Payment $payment){
        $this->resetValidation();
        $this->payment=$payment;
    }
    public function update(Payment $payment){
        $this->validate();
        $this->payment->save();//actualiza bd

        $this->payment=new Payment();

        $this->course= Course::find($this->course->id);
    }

    public function destroy(Payment $payment){

        $payment->delete();
        $this->course= Course::find($this->course->id);
    }

    public function cancel(){
        $this->payment=new Payment();
    }
}
