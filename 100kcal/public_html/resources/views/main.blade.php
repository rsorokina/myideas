@extends('layouts.app')

@section('content')

        
            
            <div class="alert alert-success clearfix">
                <div class="col-md-6" ng-controller="timerController">
                    <h4>Timer</h4>
                    <div class="alert alert-success clearfix">
                    
                    currentTime: @{{currentTime | date: 'hh:mm:ss'}}
                    <br />
                    nextTime: @{{nextTime | date: 'hh:mm:ss'}}
                    
                    </div>
                    <div class="col-md-4">@{{courseName}}</div>
                    <div class="col-md-8">
                        <div ng-repeat="food in composition">
                            @{{food.foodName}}(@{{food.unit}}unit - @{{food.cm}}g)
                        </div>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="title">random menu</div>
                    <div class="clearfix">
                        @foreach ($menu as $key => $course)
                        
                        <div class="row">
                                <div class="col-md-4">{{$course->name}}</div>
                                <div class="col-md-8">
                                    @foreach ($composition[$key] as $item)
                                        {{$item['food']->name}} ({{$item['unit']}}unit - {{$item['cm']}}g)<br />
                                    @endforeach
                                </div>
                        </div>
                        <br />
                        @endforeach
                    </div>
                </div>
            </div>
            <div class="col-md-6 clearfix">
                <div class="title">courses</div>
                <table class="table">
                    <thead>
                        <th>id</th>
                        <th>name</th>
                        <th>composition</th>
                        
                        <th>recipe kcal</th>
                        
                    </thead>
                    <tbody>
                    @foreach ($courses as $course)
                        <tr>
                            <td>{{$course->id}}</td>
                            <td>{{$course->name}}</td>
                            <td>{{$course->composition}}</td>
                            
                            <td>{{$course->kcal or 0}}</td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
                <div class="row">
                    <form method="post" action="course/create" class="">
                        {{ csrf_field() }}
                        <div class="row">
                            <div class="form-group col-md-4">
                                <label>Name</label>
                                <input type="text" name="name" class="form-control" value="" />
                            </div>
                            <div class="form-group col-md-4">
                                <label>Food</label>
                                <div class="clearfix form-group">
                                    <select name="fid[0]" class="form-control">
                                        <option></option>
                                        @foreach ($foods as $food)
                                        <option value="{{$food->id}}">{{$food->name}}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="clearfix form-group">
                                    <select name="fid[1]" class="form-control">
                                        <option></option>
                                        @foreach ($foods as $food)
                                        <option value="{{$food->id}}">{{$food->name}}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="clearfix form-group">
                                    <select name="fid[2]" class="form-control">
                                        <option></option>
                                        @foreach ($foods as $food)
                                        <option value="{{$food->id}}">{{$food->name}}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            
                            
                            <div class="form-group col-md-2">
                                <label>unit</label>
                                <div class="clearfix form-group">
                                    <input type="text" name="unit[0]" class="form-control"/>
                                </div>
                                <div class="clearfix form-group">
                                    <input type="text" name="unit[1]" class="form-control"/>
                                </div>
                                <div class="clearfix form-group">
                                    <input type="text" name="unit[2]" class="form-control"/>
                                </div>
                            </div>
                            <div class="form-group col-md-2">
                                <label>weight</label>
                                <div class="clearfix form-group">
                                    <input type="text" name="weight[0]" class="form-control"/>
                                </div>
                                <div class="clearfix form-group">
                                    <input type="text" name="weight[1]" class="form-control"/>
                                </div>
                                <div class="clearfix form-group">
                                    <input type="text" name="weight[2]" class="form-control"/>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="form-group col-md-3">
                                <br />
                                <button class="btn btn-danger">Add course</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
            <div class="col-md-6">
                <div class="title">Foods</div>
                <table class="table">
                    <thead>
                        <th>id</th>
                        <th>name</th>
                        <th>Kcal/100g</th>
                        <th>Weight(unit)</th>
                    </thead>
                    <tbody>
                    @foreach ($foods as $food)
                        <tr>
                            <td>{{$food->id}}</td>
                            <td>{{$food->name}}</td>
                            <td>{{$food->kcal}}</td>
                            <td>{{$food->weight}}</td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
                <div class="row">
                    <form method="post" action="food/create" class="">
                        {{ csrf_field() }}
                        <div class="form-group col-md-4">
                            <label>Name</label>
                            <input type="text" name="name" class="form-control" value="" />
                        </div>
                        <div class="form-group col-md-3">
                            <label>Kcal</label>
                            <input type="text" name="kcal" class="form-control" value="" />
                        </div>
                        <div class="form-group col-md-3">
                            <label>Weight</label>
                            <input type="text" name="weight" class="form-control" value="" />
                        </div>
                        <div class="form-group col-md-2">
                            <br />
                            <button class="btn btn-danger">Add food</button>
                        </div>
                    </form>
                </div>
                
            </div>
        
@endsection
