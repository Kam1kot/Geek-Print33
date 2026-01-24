<?php
namespace App\Services;

use App\Models\Category;
use Surfsidemedia\Shoppingcart\Facades\Cart;
use Telegram\Bot\Laravel\Facades\Telegram;

class TelegramService
{
    public function checkout(array $customer) {
        $cart = Cart::instance('cart')->content();

        $text = "📦 <b>Новый заказ</b>\n";
        $text .= "\n";

        $text .= "👤 Контактные данные 👤\n";
        $text .= "- Имя: {$customer['first_name']}\n";
        $text .= "- Фамилия: {$customer['last_name']}\n";
        $text .= "- Телефон: {$customer['phone']}\n";
        $text .= "\n";

        if (isset($customer['comment'])) {
            $text .= "📝 Комментарий 📝\n";
            $text .= "{$customer['comment']}\n\n";
        } else {
            $text .= "Комментария нет";
        }
        $text .= "📋 Товары: 📋\n";
        
        foreach ($cart as $row) {
            $text .= sprintf(
                "- %s  × %d  = %s₽\n",
                $row->name,
                $row->qty,
                number_format($row->subtotal, 2, '.', ' ')
            );
        }
        $text .= "\n💰 <b>Итого:</b> " . Cart::subtotal() . " ₽";
        
        Telegram::sendMessage([
            'chat_id' => env('TELEGRAM_CHAT_ID'),
            'text' => $text,
            'parse_mode' => 'HTML',
            'disable_web_page_preview' => true,
        ]);
        
    }
}