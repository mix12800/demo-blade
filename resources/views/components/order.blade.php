   <tr>
       <td> {{ $order->room->name }} </td>
       <td>
           @if ($order->pay == 'cash')
           При очном посещении
           @else
           Переводом СБП
           @endif
       </td>
       <td> {{ $order->name }} </td>
       <td> {{ date('d.m.Y', strtotime($order->date)) }} </td>
       <td class="textwar">
           @if (count($order->comments) > 0)
           {{ $order->comments[0]->comment }}
           @else
           -----
           @endif
       </td>
       <form action="{{ route('OrderUpdateStatus', [$order->id]) }}" method="post">
           <td>

               <select class="select-status" name="status">
                   <option value="new" @if ($order->status == 'new') selected @endif>
                       Новая
                   </option>
                   <option value="active" @if ($order->status == 'active') selected @endif>
                       Мероприятие назначено
                   </option>
                   <option
                       value="completed" @if ($order->status == 'completed') selected @endif>
                       Завершено
                   </option>
               </select>

           </td>
           <td>
               <button class="btn btn-form p-05">
                   Сохранить
               </button>

           </td>
       </form>
   </tr>