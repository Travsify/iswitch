<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Flight;
use App\Models\Hotel;
use App\Models\Tour;

class ChatbotController extends Controller
{
    /**
     * iSwitch Smart Assistant
     * Parses user messages, detects intent, calls appropriate APIs,
     * and returns formatted results in conversational tone.
     */
    public function handle(Request $request)
    {
        $message = strtolower(trim($request->input('message', '')));

        if (empty($message)) {
            return response()->json($this->reply("Hi! I'm the iSwitch Assistant. Ask me about flights, hotels, visas, insurance, or tours — I'm here to help. ✈️"));
        }

        // Intent Detection via keyword analysis
        $intent = $this->detectIntent($message);

        switch ($intent) {
            case 'flight_search':
                return response()->json($this->handleFlightSearch($message));
            case 'hotel_search':
                return response()->json($this->handleHotelSearch($message));
            case 'visa_check':
                return response()->json($this->handleVisaCheck($message));
            case 'insurance':
                return response()->json($this->handleInsurance($message));
            case 'tour_search':
                return response()->json($this->handleTourSearch($message));
            case 'greeting':
                return response()->json($this->reply("Welcome to iSwitch! 👋 I can help you with:\n\n✈️ **Flights** — \"Find flights from Lagos to London\"\n🏨 **Hotels** — \"Hotels in Dubai\"\n📋 **Visas** — \"Do I need a visa for Canada?\"\n🛡️ **Insurance** — \"Travel insurance for USA\"\n🌍 **Tours** — \"Safari tours in Kenya\"\n\nJust type what you need!"));
            case 'help':
                return response()->json($this->reply("Here's what I can do:\n\n✈️ **Search Flights** — Tell me your origin and destination\n🏨 **Find Hotels** — Give me a city name\n📋 **Visa Check** — Tell me which country\n🛡️ **Insurance Quote** — Tell me your destination\n🌍 **Tours & Activities** — Tell me where you want to explore\n📞 **Talk to an Expert** — Say \"speak to an agent\"\n\nExample: *\"Flights from New York to Paris\"*"));
            case 'agent':
                return response()->json($this->reply("I'll connect you with an iSwitch specialist right away.\n\n📧 Email: **contact@iswitchub.com**\n📧 Support: **info@iswitchub.com**\n\nOr click the **Expert** button at the bottom of the page to submit a consultation request. Our team typically responds within 2 hours. 🕐"));
            default:
                return response()->json($this->reply("I'd love to help with that! Try asking me about:\n\n✈️ Flights — *\"Flights to London\"*\n🏨 Hotels — *\"Hotels in Paris\"*\n📋 Visas — *\"Visa for Canada\"*\n🛡️ Insurance — *\"Travel insurance\"*\n\nOr say **\"help\"** to see everything I can do."));
        }
    }

    private function detectIntent(string $msg): string
    {
        // Greetings
        if (preg_match('/^(hi|hello|hey|good morning|good evening|good afternoon|sup|yo|howdy|greetings)/i', $msg)) {
            return 'greeting';
        }

        // Help
        if (preg_match('/(help|what can you do|menu|options|services|what do you offer)/i', $msg)) {
            return 'help';
        }

        // Agent/human
        if (preg_match('/(agent|human|speak|talk|call|specialist|consultant|expert|support)/i', $msg)) {
            return 'agent';
        }

        // Flights
        if (preg_match('/(flight|fly|plane|airport|airline|departure|arrival|book a flight|from .* to)/i', $msg)) {
            return 'flight_search';
        }

        // Hotels
        if (preg_match('/(hotel|stay|room|accommodation|lodge|resort|motel|airbnb|where to stay|book a hotel)/i', $msg)) {
            return 'hotel_search';
        }

        // Visa
        if (preg_match('/(visa|passport|travel document|entry requirement|do i need|immigration|permit)/i', $msg)) {
            return 'visa_check';
        }

        // Insurance
        if (preg_match('/(insurance|insure|cover|coverage|travel protection|medical cover|policy|claim)/i', $msg)) {
            return 'insurance';
        }

        // Tours
        if (preg_match('/(tour|safari|adventure|explore|sightseeing|activity|things to do|excursion)/i', $msg)) {
            return 'tour_search';
        }

        return 'unknown';
    }

    private function handleFlightSearch(string $msg): array
    {
        // Try to extract origin/destination from message
        $origin = '';
        $destination = '';

        // Pattern: "from X to Y"
        if (preg_match('/from\s+(\w[\w\s]*?)\s+to\s+(\w[\w\s]*)/i', $msg, $matches)) {
            $origin = trim($matches[1]);
            $destination = trim($matches[2]);
        }
        // Pattern: "flights to X"
        elseif (preg_match('/(?:flights?|fly|going)\s+to\s+(\w[\w\s]*)/i', $msg, $matches)) {
            $destination = trim($matches[1]);
        }

        // Try to find flights in DB
        $query = Flight::query();
        if ($origin) {
            $query->where('departure_airport', 'like', '%' . $origin . '%');
        }
        if ($destination) {
            $query->where('arrival_airport', 'like', '%' . $destination . '%');
        }
        $flights = $query->limit(5)->get();

        if ($flights->count() > 0) {
            $list = $flights->map(function ($f) {
                $price = '$' . number_format($f->price ?? 0, 2);
                $dep = $f->departure_airport ?? 'N/A';
                $arr = $f->arrival_airport ?? 'N/A';
                $airline = $f->airline ?? 'iSwitch Air';
                $time = $f->departure_time ? date('M d, h:i A', strtotime($f->departure_time)) : 'TBD';
                return "✈️ **{$airline}** — {$dep} → {$arr}\n   📅 {$time} | 💰 {$price}";
            })->join("\n\n");

            return $this->reply("Here are flights I found:\n\n{$list}\n\n💡 *Create an account to book directly, or say \"speak to agent\" for help.*", 'flights', $flights->toArray());
        }

        // Fallback: return helpful guidance
        $searchTip = $destination ? "to **{$destination}**" : '';
        return $this->reply("I searched for flights {$searchTip} but couldn't find exact matches in our database right now.\n\n💡 Try these popular routes:\n• Lagos to London\n• New York to Paris\n• Dubai to Tokyo\n• Accra to Johannesburg\n\nOr say **\"speak to agent\"** — our team can find any route for you! ✈️");
    }

    private function handleHotelSearch(string $msg): array
    {
        $location = '';

        // Extract location: "hotels in X" or "stay in X"
        if (preg_match('/(?:hotels?|stay|room|accommodation)\s+(?:in|at|near)\s+(\w[\w\s]*)/i', $msg, $matches)) {
            $location = trim($matches[1]);
        }

        $query = Hotel::query();
        if ($location) {
            $query->where('location', 'like', '%' . $location . '%')
                  ->orWhere('name', 'like', '%' . $location . '%');
        }
        $hotels = $query->limit(5)->get();

        if ($hotels->count() > 0) {
            $list = $hotels->map(function ($h) {
                $price = '$' . number_format($h->price_per_night ?? 0, 2);
                $name = $h->name ?? 'Hotel';
                $loc = $h->location ?? '';
                $stars = str_repeat('⭐', min($h->rating ?? 4, 5));
                return "🏨 **{$name}** — {$loc}\n   {$stars} | 💰 {$price}/night";
            })->join("\n\n");

            return $this->reply("Here are hotels I found:\n\n{$list}\n\n💡 *Sign in to book at the best rates!*", 'hotels', $hotels->toArray());
        }

        return $this->reply("I couldn't find hotels" . ($location ? " in **{$location}**" : "") . " at the moment.\n\n💡 Try these popular destinations:\n• Dubai\n• Paris\n• Maldives\n• New York\n• Tokyo\n\nOr say **\"speak to agent\"** for personalized recommendations! 🏨");
    }

    private function handleVisaCheck(string $msg): array
    {
        $country = '';

        if (preg_match('/(?:visa|entry|travel)\s+(?:for|to|check)\s+(\w[\w\s]*)/i', $msg, $matches)) {
            $country = trim($matches[1]);
        } elseif (preg_match('/(?:do i need|need a visa|visa requirement)\s+(?:for|to)?\s*(\w[\w\s]*)/i', $msg, $matches)) {
            $country = trim($matches[1]);
        }

        // Provide visa guidance based on common destinations
        $visaData = [
            'uk' => ['status' => 'Visa Required', 'type' => 'Standard Visitor Visa', 'processing' => '3-4 weeks', 'cost' => '$135'],
            'usa' => ['status' => 'Visa Required', 'type' => 'B1/B2 Tourist Visa', 'processing' => '4-8 weeks', 'cost' => '$185'],
            'canada' => ['status' => 'Visa Required', 'type' => 'Temporary Resident Visa', 'processing' => '3-6 weeks', 'cost' => '$100'],
            'dubai' => ['status' => 'Visa on Arrival', 'type' => '30-Day Tourist Visa', 'processing' => 'On Arrival', 'cost' => 'Free'],
            'uae' => ['status' => 'Visa on Arrival', 'type' => '30-Day Tourist Visa', 'processing' => 'On Arrival', 'cost' => 'Free'],
            'kenya' => ['status' => 'E-Visa Available', 'type' => 'Single Entry e-Visa', 'processing' => '3-5 days', 'cost' => '$51'],
            'singapore' => ['status' => 'Visa Free (30 days)', 'type' => 'Visa Exemption', 'processing' => 'None', 'cost' => 'Free'],
            'japan' => ['status' => 'Visa Required', 'type' => 'Short-term Stay Visa', 'processing' => '1-2 weeks', 'cost' => '$30'],
            'france' => ['status' => 'Schengen Visa Required', 'type' => 'Short-Stay Visa', 'processing' => '2-4 weeks', 'cost' => '$90'],
            'germany' => ['status' => 'Schengen Visa Required', 'type' => 'Short-Stay Visa', 'processing' => '2-4 weeks', 'cost' => '$90'],
            'south africa' => ['status' => 'Visa Required', 'type' => 'Visitor Visa', 'processing' => '5-10 days', 'cost' => '$47'],
        ];

        $countryLower = strtolower($country);
        $found = null;
        foreach ($visaData as $key => $data) {
            if (str_contains($countryLower, $key)) {
                $found = $data;
                $country = ucfirst($key);
                break;
            }
        }

        if ($found) {
            return $this->reply("📋 **Visa Info for {$country}:**\n\n🔹 Status: **{$found['status']}**\n🔹 Type: {$found['type']}\n🔹 Processing: {$found['processing']}\n🔹 Cost: {$found['cost']}\n\n🛡️ We also offer **travel insurance** for {$country} — say *\"insurance for {$country}\"* to get a quote!\n\n💡 *Need help with your application? Say \"speak to agent\".*");
        }

        return $this->reply("📋 I can check visa requirements for popular destinations like:\n\n🇬🇧 UK • 🇺🇸 USA • 🇨🇦 Canada • 🇦🇪 Dubai\n🇰🇪 Kenya • 🇯🇵 Japan • 🇫🇷 France • 🇸🇬 Singapore\n\nTry: *\"Do I need a visa for Canada?\"*\n\nFor detailed immigration support, say **\"speak to agent\"** 📞");
    }

    private function handleInsurance(string $msg): array
    {
        $destination = '';
        if (preg_match('/insurance\s+(?:for|to|in|covering)\s+(\w[\w\s]*)/i', $msg, $matches)) {
            $destination = trim($matches[1]);
        }

        $plans = [
            ['name' => 'Basic Travel Guard', 'price' => '$25', 'coverage' => '$50,000', 'includes' => 'Medical, trip cancellation'],
            ['name' => 'Premium Shield', 'price' => '$55', 'coverage' => '$250,000', 'includes' => 'Medical, baggage, delays, evacuation'],
            ['name' => 'Platinum Cover', 'price' => '$95', 'coverage' => '$1,000,000', 'includes' => 'Full medical, concierge, 24/7 hotline'],
        ];

        $destLabel = $destination ? " for **" . ucwords($destination) . "**" : "";

        $list = collect($plans)->map(function ($p) {
            return "🛡️ **{$p['name']}** — {$p['price']}/trip\n   Coverage: {$p['coverage']}\n   Includes: {$p['includes']}";
        })->join("\n\n");

        return $this->reply("Here are our travel insurance plans{$destLabel}:\n\n{$list}\n\n💡 *Create an account to purchase a policy instantly, or say \"speak to agent\" for a custom quote.*");
    }

    private function handleTourSearch(string $msg): array
    {
        $location = '';
        if (preg_match('/(?:tours?|safari|adventure|explore|things to do)\s+(?:in|at|to|around)\s+(\w[\w\s]*)/i', $msg, $matches)) {
            $location = trim($matches[1]);
        }

        $query = Tour::query();
        if ($location) {
            $query->where('location', 'like', '%' . $location . '%')
                  ->orWhere('name', 'like', '%' . $location . '%');
        }
        $tours = $query->limit(5)->get();

        if ($tours->count() > 0) {
            $list = $tours->map(function ($t) {
                $price = '$' . number_format($t->price ?? 0, 2);
                $name = $t->name ?? 'Tour';
                $loc = $t->location ?? '';
                return "🌍 **{$name}** — {$loc}\n   💰 From {$price}/person";
            })->join("\n\n");

            return $this->reply("Here are tours I found:\n\n{$list}\n\n💡 *Sign up to book your adventure!*", 'tours', $tours->toArray());
        }

        return $this->reply("I couldn't find tours" . ($location ? " in **" . ucwords($location) . "**" : "") . " right now.\n\n🌍 Popular tour destinations:\n• Kenya Safari\n• Dubai City Tour\n• Paris Walking Tour\n• Bali Adventure\n\nSay **\"speak to agent\"** for a custom itinerary! 🗺️");
    }

    private function reply(string $text, string $type = 'text', array $data = []): array
    {
        return [
            'reply' => $text,
            'type' => $type,
            'data' => $data,
            'timestamp' => now()->toIso8601String(),
        ];
    }
}
