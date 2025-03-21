<?php

namespace Database\Seeders;

use App\Models\Article;
use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
  /**
   * Seed the application's database.
   */
  public function run(): void
  {
    User::factory()->create([
      'name' => 'Administrator',
      'email' => 'admin@example.com',
      'role' => 'admin',
    ]);

    $articles = [
      [
        'slug' => 'debt-accumulation',
        'title' => 'Debt Accumulation.',
        'description' => 'We found the Issue which is, Excessive consumer debt (credit cards, loans) undermines financial stability. The Evidence is 40% of U.S. adults struggle to pay bills due to debt (Federal Reserve, 2022). We got it from, Federal Reserve Report on Economic Well-Being.',
        'video_url' => 'https://www.youtube.com/embed/7poPCvPYWKY',
        'source_url' => 'https://consumer.ftc.gov/articles/how-get-out-debt',
        'source_title' => 'How to get out of debt.',
      ],
      [
        'slug' => 'lifestyle-inflation',
        'title' => 'Lifestyle Inflation.',
        'description' => 'We found the Issue which is, Rising income leads to increased spending rather than savings or investments. The Evidence is, 60% of income growth in developed nations fuels consumption (OECD, 2021). We got it from, OECD Policy Paper on Household Spending.',
        'video_url' => 'https://www.youtube.com/embed/L4Y-HjQBEyE',
        'source_url' => 'https://www.atypicalfinance.com/reverse-lifestyle-inflation',
        'source_title' => 'Reverse your Lifestyle Inflantion!.',
      ],
      [
        'slug' => 'lack-of-emergency-savings',
        'title' => 'Lack of Emergency Savings.',
        'description' => 'We found the Issue which is, Inability to cover unexpected expenses creates financial vulnerability.The Evidence is, 57% of Americans cannot afford a $1,000 emergency without debt (Bankrate, 2023).We got it from, Bankrate Emergency Savings Survey',
        'video_url' => 'https://www.youtube.com/embed/tVGJqaOkqac',
        'source_url' => 'https://edition.cnn.com/2024/03/11/success/lack-of-emergency-savings/index.html',
        'source_title' => 'Inexpensive ways to Access Emergency Funds.',
      ],
      [
        'slug' => 'inadequate-retirement-planning',
        'title' => 'Inadequate Retirement Planning.',
        'description' => 'We found the Issue which is, Poor preparation for retirement risks long-term of financial insecurity. The Evidence is, Global retirement savings gap could reach $400 trillion by 2050 (World Economic Forum, 2023). We got it from, WEF Global Retirement Report',
        'video_url' => 'https://www.youtube.com/embed/pZNnueqfj_A',
        'source_url' => 'https://www.expat.hsbc.com/retirement/checklist-for-retirement',
        'source_title' => 'Planning for Retirement Checklist.',
      ],
      [
        'slug' => 'low-financial-literacy',
        'title' => 'Low Financial Literacy.',
        'description' => 'We found the Issue, which is, Lack of basic financial knowledge hinders effective money management. The Evidence is, Only 30% of adults globally understand compound interest (Lusardi & Mitchell, NBER, 2014). We got it from, NBER Study on Financial Literacy',
        'video_url' => 'https://www.youtube.com/embed/q5JWp47z4bY',
        'source_url' => 'https://www.forbes.com/sites/truetamplin/2023/09/21/financial-literacy--meaning-components-benefits--strategies',
        'source_title' => 'Why Financial Literacy is Important?',
      ]
    ];

    foreach ($articles as $article) {
      Article::create($article);
    }
  }
}
