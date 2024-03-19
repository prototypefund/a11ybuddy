<?php

namespace A11yBuddy\Frontend\Projects;

use A11yBuddy\Application;
use A11yBuddy\Frontend\View;

class ShowListOfUserProjectsView extends View
{
    public function render(array $data = []): void
    {
        $projects = $data["projects"];
        ?>
        <h1>
            Your projects
        </h1>
        <p>
            This is where the list of your projects will be displayed.
        </p>
        <table class="table table-striped">
            <tr>
                <?php
                foreach (array_keys($projects[0]) as $project) {
                    echo "<th>" . $project . "</th>";
                }
                ?>
            </tr>
            <?php
            foreach ($projects as $project) {
                echo "<tr>";
                foreach ($project as $key => $project) {

                    if ($key === "text_identifier") {
                        echo "<td><a href='/projects/" . $project . "'>" . $project . "</a></td>";
                        continue;
                    }

                    echo "<td>" . $project . "</td>";

                }
                echo "</tr>";
            }
            ?>
        </table>
        <?php
    }
}