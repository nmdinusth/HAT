<?php

namespace App\Filament\Admin\Resources;

use App\Filament\Admin\Resources\HotelResource\Pages;
use App\Filament\Admin\Resources\HotelResource\RelationManagers;
use App\Models\clients\Hotel;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\Toggle;
use Filament\Forms\Components\FileUpload;
use Filament\Forms\Components\TimePicker;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Columns\IconColumn;
use Filament\Tables\Actions\EditAction;
use Filament\Tables\Actions\DeleteAction;
use Filament\Forms\Components\CheckboxList;
use App\Models\clients\Amenity;

class HotelResource extends Resource
{
    protected static ?string $model = Hotel::class;

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                TextInput::make('name')->label('Tên khách sạn')->required()->maxLength(255),
                TextInput::make('address')->label('Địa chỉ')->required()->maxLength(255),
                TextInput::make('phone_number')->label('Số điện thoại')->maxLength(50),
                TextInput::make('email')->label('Email')->email()->maxLength(255),
                TextInput::make('cached_city_name')->label('Tên thành phố')->maxLength(255),
                Textarea::make('description')->label('Mô tả'),
                FileUpload::make('cover_image')
                    ->label('Ảnh đại diện')
                    ->directory('hotels/covers')
                    ->image()
                    ->required()
                    ->helperText('Vui lòng upload ảnh tỉ lệ 4:3 (ví dụ: 800x600px, 1200x900px) để hiển thị đẹp nhất.'),
                TextInput::make('video_url')
                    ->label('Link video YouTube')
                    ->url()
                    ->maxLength(255),
                FileUpload::make('images')
                    ->label('Ảnh khách sạn (gallery)')
                    ->multiple()
                    ->directory('hotels/gallery')
                    ->reorderable()
                    ->helperText('Vui lòng upload ảnh tỉ lệ 16:9 (ví dụ: 1280x720px, 1920x1080px) để hiển thị đẹp nhất.'),
                CheckboxList::make('amenities')
                    ->label('Tiện ích khách sạn')
                    ->relationship('amenities', 'name')
                    ->columns(2)
                    ->helperText('Chọn các tiện ích đi kèm cho khách sạn.'),
                TimePicker::make('check_in_time')->label('Giờ check-in'),
                TimePicker::make('check_out_time')->label('Giờ check-out'),
                Toggle::make('is_active')->label('Hoạt động'),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('id')->sortable(),
                TextColumn::make('name')->label('Tên khách sạn')->searchable(),
                TextColumn::make('address')->label('Địa chỉ')->searchable(),
                TextColumn::make('phone_number')->label('Số điện thoại'),
                TextColumn::make('email')->label('Email'),
                TextColumn::make('cached_city_name')->label('Thành phố'),
                IconColumn::make('is_active')->label('Hoạt động')->boolean(),
                TextColumn::make('created_at')->dateTime('d/m/Y H:i')->sortable(),
            ])
            ->filters([
                //
            ])
            ->actions([
                EditAction::make(),
                DeleteAction::make(),
            ])
            ->bulkActions([
                Tables\Actions\BulkActionGroup::make([
                    Tables\Actions\DeleteBulkAction::make(),
                ]),
            ])
            ->emptyStateActions([
                Tables\Actions\CreateAction::make(),
            ]);
    }
    
    public static function getRelations(): array
    {
        return [
            //
        ];
    }
    
    public static function getPages(): array
    {
        return [
            'index' => Pages\ListHotels::route('/'),
            'create' => Pages\CreateHotel::route('/create'),
            'edit' => Pages\EditHotel::route('/{record}/edit'),
        ];
    }    
}
