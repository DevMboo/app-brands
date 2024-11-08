<div style="font-family: Arial, sans-serif; color: #333;">
    <h1 style="font-size: 20px; margin-bottom: 10px; padding-bottom: 10px; border-bottom: 1px solid #ddd; text-align: center;">
        {{ $title }}
    </h1>

    @if($data->isNotEmpty())
        <table style="width: 100%; border-collapse: collapse; margin-top: 15px;">
            <thead style="background-color: #333; color: white;">
                <tr>
                    @foreach(array_keys($data->first()) as $key)
                        <th style="padding: 12px; text-align: left; border: 1px solid #ddd; font-size: 14px;">
                            {{ $aliases[$key] ?? ucfirst($key) }}
                        </th>
                    @endforeach
                </tr>
            </thead>
  
            <tbody>
                @foreach($data as $item)
                    <tr>
                        @foreach($item as $key => $value)
                            <td style="padding: 10px; text-align: left; border: 1px solid #ddd; font-size: 13px; page-break-inside: avoid !important;">
                                @if ($value instanceof \Illuminate\Database\Eloquent\Model) 
                                    {{ $value->name ?? 'N/A' }}
                                @elseif ($value instanceof \Carbon\Carbon) 
                                    {{ $value->format('d/m/Y H:i:s') }}
                                @elseif ($key == 'created_at' || $key == 'updated_at') 
                                    {{ \Carbon\Carbon::parse($value)->format('d/m/Y H:i:s') }}
                                @else
                                    {{ $value }}
                                @endif
                            </td>
                        @endforeach
                    </tr>
                @endforeach

            </tbody>
        </table>
    @else
        <p style="font-size: 14px; color: #666; text-align: center; margin-top: 20px;">
            Nenhum dado disponível para exibição, verifique os filtros aplicados na consulta.
        </p>
    @endif
</div>
