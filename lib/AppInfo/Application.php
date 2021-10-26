<?php

declare(strict_types=1);

/**
 * @author Christoph Wurst <christoph@winzerhof-wurst.at>
 *
 * @license GNU AGPL version 3 or any later version
 *
 * This program is free software: you can redistribute it and/or modify
 * it under the terms of the GNU Affero General Public License as
 * published by the Free Software Foundation, either version 3 of the
 * License, or (at your option) any later version.
 *
 * This program is distributed in the hope that it will be useful,
 * but WITHOUT ANY WARRANTY; without even the implied warranty of
 * MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
 * GNU Affero General Public License for more details.
 *
 * You should have received a copy of the GNU Affero General Public License
 * along with this program.  If not, see <http://www.gnu.org/licenses/>.
 *
 */

namespace OCA\SuspiciousLogin\AppInfo;

use OCP\AppFramework\App;
use OCP\AppFramework\Bootstrap\IBootstrap;
use OCP\AppFramework\Bootstrap\IBootContext;

class Application extends App implements IBootstrap {
	public const APP_ID = 'suspicious_login';

	public function __construct(array $urlParams = []) {
		parent::__construct(self::APP_ID, $urlParams);

		BootstrapSingleton::getInstance($this->getContainer())->boot();
	}

	public function boot(IBootContext $context): void {
		// Query the app instance in the hope it's instantiated exactly once
		\OC::$server->query(\OCA\SuspiciousLogin\AppInfo\Application::class);
	}
}
