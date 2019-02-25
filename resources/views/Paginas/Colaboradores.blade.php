@extends('layouts.app')

    @section('content')
    <h1>Colaboradores del Proyecto!</h1>

    <table class= "table table-hover table-dark">
        <thead>
            <tr>
                <th scope="col">#</th>
                <th scope="col">Nombre</th>
                <th scope="col" colspan="2">Apellido</th>
            </tr>
            
        </thead>
        <tbody>
            <tr>
                <td scope="row">1</td>
                <td>Michelle</td>
                <td colspan="2">González Amador</td>
            </tr>
            <tr>
                <td scope="row">2</td>
                <td>Christian Daniel</td>
                <td>Ramos Vallejo</td>
                <td><a href="https://www.facebook.com/christiandaniel.ramosvallejo">facebook</a></td>
            </tr>
        </tbody>
    </table>
    @endsection