<?php

/*
   Copyright 2024 Casey Kreer

   Licensed under the Apache License, Version 2.0 (the "License");
   you may not use this file except in compliance with the License.
   You may obtain a copy of the License at

       http://www.apache.org/licenses/LICENSE-2.0

   Unless required by applicable law or agreed to in writing, software
   distributed under the License is distributed on an "AS IS" BASIS,
   WITHOUT WARRANTIES OR CONDITIONS OF ANY KIND, either express or implied.
   See the License for the specific language governing permissions and
   limitations under the License.
*/

namespace A11yBuddy\Frontend\BasePage;

use A11yBuddy\Application;
use A11yBuddy\Frontend\Localize;
use A11yBuddy\Frontend\View;

class FooterView implements View
{

    public static function render(array $data = [])
    {
        ?>
        <footer class="mt-5">
            <hr class="mb-3" aria-hidden="true">
            <div class="container">
                <p class="text-center">
                    <?php echo Application::NAME . " - " . Application::VERSION; ?>
                </p>
                <p class="text-center">
                    <?php
                    // Output custom footer links
                    $links = Application::getInstance()->getConfig()["footer"]["links"];
                    $locale = Localize::getInstance()->getLocale();

                    if (isset($links[$locale])) {
                        foreach ($links[$locale] as $link => $title) {
                            echo '<a href="' . $link . '">' . $title . '</a> ';
                        }
                    }
                    ?>
                </p>
            </div>
        </footer>

        <script src="template/dependencies/bootstrap/js/bootstrap.bundle.min.js"></script>
        <?php
    }

}