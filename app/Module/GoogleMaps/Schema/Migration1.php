<?php
/**
 * webtrees: online genealogy
 * Copyright (C) 2018 webtrees development team
 * This program is free software: you can redistribute it and/or modify
 * it under the terms of the GNU General Public License as published by
 * the Free Software Foundation, either version 3 of the License, or
 * (at your option) any later version.
 * This program is distributed in the hope that it will be useful,
 * but WITHOUT ANY WARRANTY; without even the implied warranty of
 * MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE. See the
 * GNU General Public License for more details.
 * You should have received a copy of the GNU General Public License
 * along with this program. If not, see <http://www.gnu.org/licenses/>.
 */
namespace Fisharebest\Webtrees\Module\GoogleMaps\Schema;

use Fisharebest\Webtrees\Database;
use Fisharebest\Webtrees\Schema\MigrationInterface;
use PDOException;

/**
 * Upgrade the database schema from version 1 to version 2.
 */
class Migration1 implements MigrationInterface {
    /** {@inheritDoc} */
    public function upgrade() {
        // Update the tables to support streetview
        try {
            Database::exec(
                "ALTER TABLE `##placelocation` ADD (" .
                " pl_media      VARCHAR(60)     NULL," .
                " sv_long       FLOAT           NOT NULL DEFAULT 0," .
                " sv_lati       FLOAT           NOT NULL DEFAULT 0," .
                " sv_bearing    FLOAT           NOT NULL DEFAULT 0," .
                " sv_elevation  FLOAT           NOT NULL DEFAULT 0," .
                " sv_zoom       FLOAT           NOT NULL DEFAULT 1" .
                ")"
            );
        } catch (PDOException $ex) {
            // Already done this?
        }
    }
}