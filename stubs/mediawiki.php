<?php

// Stubs for MediaWiki core classes not available at PHPStan analysis time.
// Only methods actually called in extension src/ are declared.

namespace {

    class OutputPage
    {
        public function addHTML(string $html): void {}
        public function getTitle(): \MediaWiki\Title\Title {}
        public function getContext(): \IContextSource {}
    }

    class SkinTemplate
    {
        /** @var string */
        public $skinname;
        /** @var string */
        public $stylename;
        /** @var string */
        public $template;

        public function __construct(string $skinname) {}
        public function initPage(\MediaWiki\Output\OutputPage $out): void {}
        /** @param mixed $classname @param mixed $repository @param mixed $cache_dir @return mixed */
        public function setupTemplate(mixed $classname, mixed $repository = false, mixed $cache_dir = false): mixed {}
        public function getUser(): \User {}
        public function getTitle(): \MediaWiki\Title\Title {}
        public function getRelevantTitle(): \MediaWiki\Title\Title {}
        /** @return array<string, mixed> */
        public function getFooterIcons(): array {}
        /** @param array<string, mixed> $icon */
        public function makeFooterIcon(array $icon): string {}
        public function getOutput(): \MediaWiki\Output\OutputPage {}
    }

    class BaseTemplate
    {
        /** @var array<string, mixed> */
        public array $data;
        public \MediaWiki\Config\Config $config;

        public function getSkin(): \SkinTemplate {}
        public function html(string $key): void {}
        public function text(string $key): void {}
        public function msg(string $key): void {}
        public function getMsg(string $key): \Message {}
        /** @param array<string, mixed> $val */
        public function makeListItem(string $key, array $val): string {}
        /** @param array<string, mixed> $options */
        public function makeSearchInput(array $options = []): string {}
        public function makeSearchButton(string $mode, array $options = []): string {}
        /** @return array<string, mixed> */
        public function getPersonalTools(): array {}
        /** @return array<string, array<int, string>> */
        public function getFooterLinks(): array {}
        /** @return mixed */
        public function get(string $key): mixed {}
        public function getIndicators(): string {}
    }

    interface IContextSource
    {
        public function getWikiPage(): \WikiPage;
    }

    class MWContent
    {
        /** @return mixed */
        public function getNativeData() {}
    }

    class WikiPage
    {
        public function getTitle(): \MediaWiki\Title\Title {}
        public function getContent(): \MWContent {}
        public function getId(): int {}
    }

    class User extends \MediaWiki\User\User {}

    class WebRequest extends \MediaWiki\Request\WebRequest {}

    class ApiResult
    {
        /** @return mixed[] */
        public function getResultData(): array {}
    }

    class ApiMain
    {
        public function __construct(\WebRequest $context) {}
        public function execute(): void {}
        public function getResult(): \ApiResult {}
    }

    class ApiBase
    {
        public function getModuleName(): string {}
        public function getRequest(): \WebRequest {}
    }

    class ApiQueryBase extends ApiBase {}

    class ResourceLoader extends \MediaWiki\ResourceLoader\ResourceLoader {}

    class MWException extends \Exception {}

    class UserNotLoggedIn extends \Exception {}

    interface PPFrame
    {
        /** @return array<string, mixed> */
        public function getNamedArguments(): array;
    }

    class PPTemplateFrame_Hash implements PPFrame
    {
        public int $depth;

        /** @return array<string, mixed> */
        public function getNamedArguments(): array {}
    }

    class Parser
    {
        public function setHook(string $tag, callable $callback): void {}
        public function getOutput(): \ParserOutput {}
        public function recursiveTagParse(string $text, \PPFrame|false $frame = false): string {}
        public function getTitle(): \MediaWiki\Title\Title {}
        public function getRevisionId(): ?int {}
        public function makeImage(\MediaWiki\Title\Title $title, string $options = ''): string {}
    }

    class ParserOutput
    {
        public function updateCacheExpiry(int $seconds): void {}
        public function addHeadItem(string $section, string $tag = ''): void {}
        /** @param string[] $modules */
        public function addModules(array $modules): void {}
        public function addImage(string $name, mixed $timestamp = false, mixed $sha1 = false): void {}
        public function addLink(\MediaWiki\Title\Title $title, ?int $id = null): void {}
        public function addExternalLink(string $url): void {}
    }

    class ExtensionRegistry
    {
        public static function getInstance(): self {}
        public function isLoaded(string $name): bool {}
    }

    class Xml
    {
        public static function element(string $element, ?array $attribs = null, string $contents = '', bool $allowShortTag = true): string {}
    }

    class Message extends \MediaWiki\Message\Message {}

    function wfMessage(string $key, mixed ...$params): \Message {}

    function wfTimestampNow(): string {}

    class StatusValue
    {
        public static function newGood(mixed $value = null): static {}
    }

    class RepoGroup
    {
        public function findFile(\MediaWiki\Title\Title|string $title): \File|false {}
    }

    class File
    {
        public function getMimeType(): string {}
        public function getWidth(): int {}
        public function getHeight(): int {}
        public function exists(): bool {}
    }

}

namespace MediaWiki\Title {

    class Title
    {
        public function getBaseText(): string {}
        public function inNamespace(int $ns): bool {}
        public function getPrefixedText(): string {}
        public static function newFromText(?string $text, int $defaultNamespace = 0): ?self {}
        public function getNamespace(): int {}
        public function getDBkey(): string {}
        public function getFullText(): string {}
        public function isExternal(): bool {}
        public function getPrefixedDBkey(): string {}
        public function getFragment(): string {}
        public function getFragmentForURL(): string {}
        public function getLocalURL(): string {}
        public function getPrefixedURL(): string {}
        public function getArticleID(): int {}
        public function getPageLanguage(): \Language {}
    }

}

namespace {

    class Language
    {
        public function getHtmlCode(): string {}
        public function getCode(): string {}
    }

}

namespace MediaWiki {

    class MediaWikiServices
    {
        public static function getInstance(): self {}
        public function getConnectionProvider(): \Wikimedia\Rdbms\IConnectionProvider {}
        public function getRepoGroup(): \RepoGroup {}
        public function getConfigFactory(): \MediaWiki\Config\ConfigFactory {}
        public function getHookContainer(): \MediaWiki\HookContainer\HookContainer {}
        public function getWatchlistManager(): \MediaWiki\Watchlist\WatchlistManager {}
        public function getGroupPermissionsLookup(): \MediaWiki\Permissions\GroupPermissionsLookup {}
        public function getRevisionLookup(): \MediaWiki\Revision\RevisionLookup {}
    }

    class MainConfigNames
    {
        public const EnableBotPasswords = 'EnableBotPasswords';
    }

}

namespace MediaWiki\Settings {

    class SettingsBuilder
    {
        public function overrideConfigValue(string $key, mixed $value): self {}
    }

}

namespace MediaWiki\Revision {

    class SlotRecord
    {
        public const MAIN = 'main';
    }

    interface RevisionRecord
    {
        public function getContent(string $role): ?\MediaWiki\Content\Content;
    }

    interface RevisionLookup
    {
        public function getRevisionByTitle(\MediaWiki\Title\Title $title, int $revId = 0, int $flags = 0): ?RevisionRecord;
    }

}

namespace MediaWiki\Output {

    class OutputPage
    {
        public function addMeta(string $name, string $content): void {}
        /** @param string|string[] $modules */
        public function addModuleStyles(mixed $modules): void {}
        public function addModules(string ...$modules): void {}
        public function addHTML(string $html): void {}
        public function getTitle(): \MediaWiki\Title\Title {}
        public function headElement(\SkinTemplate $skin): string {}
        public function getBottomScripts(): string {}
        public function addHeadItem(string $name, string $value): void {}
    }

}

namespace MediaWiki\Config {

    interface Config
    {
        /** @return mixed */
        public function get(string $name): mixed;
        public function has(string $name): bool;
    }

    class ConfigFactory
    {
        public function makeConfig(string $name): \MediaWiki\Config\Config {}
    }

}

namespace MediaWiki\Html {

    class Html
    {
        /** @param array<string, mixed> $attribs */
        public static function rawElement(string $element, array $attribs = [], string $contents = ''): string {}
        /** @param array<string, mixed> $attribs */
        public static function hidden(string $name, string $value, array $attribs = []): string {}
        /**
         * @param array<int|string, mixed> $attribs
         */
        public static function element(string $element, array $attribs = [], string $contents = ''): string {}
    }

}

namespace MediaWiki\Linker {

    class Linker
    {
        public static function tooltip(string $name, ?string $options = null): string {}
        /** @param array<string, mixed> $msgParams @return array<string, string> */
        public static function tooltipAndAccesskeyAttribs(string $name, array $msgParams = [], ?string $options = null): array {}
    }

}

namespace MediaWiki\Parser {

    class Sanitizer
    {
        public static function escapeIdForAttribute(string $id, int $mode = 0): string {}
        public static function validateEmail(string $addr): bool {}
    }

}

namespace MediaWiki\Xml {

    class Xml
    {
        /** @param array<string, string>|null $attribs */
        public static function expandAttributes(?array $attribs): string {}
    }

}

namespace MediaWiki\HookContainer {

    class HookContainer
    {
        /** @param mixed[] $args */
        public function run(string $hook, array $args = []): bool {}
    }

}

namespace MediaWiki\Hook {

    interface ParserFirstCallInitHook
    {
        /** @param \Parser $parser */
        public function onParserFirstCallInit($parser);
    }

    interface BeforeInitializeHook
    {
        /**
         * @param \MediaWiki\Title\Title $title
         * @param null $unused
         * @param \MediaWiki\Output\OutputPage $output
         * @param \MediaWiki\User\User $user
         * @param \MediaWiki\Request\WebRequest $request
         * @param \MediaWiki\Actions\ActionEntryPoint $mediaWikiEntryPoint
         * @return bool|void
         */
        public function onBeforeInitialize($title, $unused, $output, $user, $request, $mediaWikiEntryPoint);
    }

    interface ApiBeforeMainHook
    {
        /**
         * @param \MediaWiki\Api\ApiMain $main
         * @return bool|void
         */
        public function onApiBeforeMain(&$main);
    }

    interface UserLogoutCompleteHook
    {
        /**
         * @param \MediaWiki\User\User $user
         * @param string $inject_html
         * @param string $oldName
         * @return bool|void
         */
        public function onUserLogoutComplete($user, &$inject_html, $oldName);
    }

}

namespace MediaWiki\Watchlist {

    class WatchlistManager
    {
        public function isWatched(\User $user, \MediaWiki\Title\Title $title): bool {}
    }

}

namespace MediaWiki\Permissions {

    class GroupPermissionsLookup
    {
        public function groupHasPermission(string $group, string $permission): bool {}
    }

    interface Authority
    {
        public function isRegistered(): bool;
    }

}

namespace MediaWiki\ResourceLoader {

    class ResourceLoader
    {
        /** @param mixed[] $info */
        public function register(string $name, array $info): void {}
    }

    class Context {}

    abstract class Module
    {
        public const LOAD_STYLES = 'styles';
        public const LOAD_GENERAL = 'general';
        public const ORIGIN_CORE_SITEWIDE = 1;
        public const ORIGIN_USER_SITEWIDE = 3;

        /** @param mixed[]|null $options */
        public function __construct(?array $options = null) {}

        /** @return string|mixed[] */
        public function getScript(Context $context) {}

        /** @return mixed[] */
        public function getStyles(Context $context) {}

        /** @return string */
        public function getType() {}

        /** @return bool */
        public function enableModuleContentVersion() {}
    }

}

namespace MediaWiki\Request {

    class WebRequest
    {
        /** @return string[] */
        public function getValueNames(): array {}
        public function getVal(string $name, mixed $default = null): mixed {}
        public function getCheck(string $name): bool {}
        public function getIP(): string {}
        /**
         * @return array<string, string>
         */
        public function getAllHeaders(): array {}
        public function getCookie(string $key, ?string $prefix = null, mixed $default = null): mixed {}
        public function getSession(): \MediaWiki\Session\Session {}
        public function response(): WebResponse {}
    }

    class WebResponse
    {
        /**
         * @param array<string, mixed> $options
         */
        public function setCookie(string $name, string $value, ?int $expire = 0, array $options = []): void {}

        /**
         * @param array<string, mixed> $options
         */
        public function clearCookie(string $name, array $options = []): void {}
    }

    class FauxRequest extends \WebRequest
    {
        /** @param mixed[] $data */
        public function __construct(array $data = [], bool $wasPosted = false) {}
    }

}

namespace MediaWiki\EditPage {

    class EditPage
    {
        public function getTitle(): \MediaWiki\Title\Title {}
    }

}

namespace MediaWiki\Content {

    interface Content
    {
        public function getNativeData();
    }

}

namespace Wikimedia\Rdbms {

    interface IConnectionProvider
    {
        public function getReplicaDatabase(): \Wikimedia\Rdbms\IReadableDatabase;
    }

    /**
     * @extends \Iterator<int, \stdClass>
     */
    interface IResultWrapper extends \Iterator
    {
        public function current(): \stdClass;
    }

    interface IReadableDatabase
    {
        public function select(
            mixed $tables,
            mixed $fields,
            mixed $conds = '',
            string $fname = '',
            array $options = [],
            array $join_conds = []
        ): \Wikimedia\Rdbms\IResultWrapper;
    }

}

namespace Aws {

    class StreamBody
    {
        public function getContents(): string {}
    }

    class Result
    {
        public function get(string $key): \Aws\StreamBody {}
    }

}

namespace Aws\S3 {

    class S3Client
    {
        /** @param mixed[] $args */
        public function getObject(array $args): \Aws\Result {}
        /** @param mixed[] $args */
        public function putObject(array $args): \Aws\Result {}
    }

}

namespace MediaWiki\User {

    class User
    {
        public function isAllowed(string $permission): bool {}
        public function isRegistered(): bool {}
        public function getName(): string {}
        public function getEmail(): string {}
        public function getEmailAuthenticationTimestamp(): ?string {}
        public function setEmail(string $str): void {}
        public function setEmailAuthenticationTimestamp(?string $timestamp): void {}
        public function getRealName(): string {}
        public function setRealName(string $str): void {}
        public function saveSettings(): void {}
        public function getInstanceFromPrimary(int $loadFlags = 1): ?self {}
        public function getRequest(): \MediaWiki\Request\WebRequest {}
        public function doLogout(): void {}
    }

    interface UserRigorOptions
    {
        public const RIGOR_CREATABLE = 'creatable';
        public const RIGOR_USABLE = 'usable';
        public const RIGOR_VALID = 'valid';
        public const RIGOR_NONE = 'none';
    }

    class UserNameUtils implements UserRigorOptions
    {
        public function getCanonical(string $name, string $validate = self::RIGOR_VALID): string|false {}
    }

}

namespace MediaWiki\Session {

    class Session
    {
        public function get(string $key, mixed $default = null): mixed {}
        public function set(string $key, mixed $value): void {}
        public function remove(string $key): void {}
        public function shouldRememberUser(): bool {}
        public function getProvider(): SessionProvider {}
    }

    abstract class SessionProvider
    {
        public function getRememberUserDuration(): ?int {}
    }

}

namespace MediaWiki\Api {

    class ApiMain
    {
        public function getRequest(): \MediaWiki\Request\WebRequest {}
        public function getUser(): \MediaWiki\User\User {}
    }

}

namespace MediaWiki\Actions {

    class ActionEntryPoint {}

}

namespace MediaWiki\Logger {

    class LoggerFactory
    {
        public static function getInstance(string $channel): \Psr\Log\LoggerInterface {}
    }

}

namespace MediaWiki\Message {

    class Message
    {
        public function inContentLanguage(): self {}
        public function text(): string {}
        public function exists(): bool {}
        public function escaped(): string {}
        public static function plaintextParam(string $plaintext): mixed {}
    }

}

namespace MediaWiki\Language {

    class RawMessage extends \MediaWiki\Message\Message
    {
        /**
         * @param mixed[] $params
         */
        public function __construct(string $text, array $params = []) {}
    }

}

namespace MediaWiki\HTMLForm {

    class HTMLForm
    {
        public function getOutput(): \MediaWiki\Output\OutputPage {}
        public function getLanguage(): \Language {}
    }

    abstract class HTMLFormField
    {
        /**
         * @var string
         */
        protected $mName;

        public ?HTMLForm $mParent = null;

        /**
         * @param array<string, mixed> $params
         */
        public function __construct($params) {}

        /**
         * @param mixed $value
         * @return string
         */
        abstract public function getInputHTML($value);
    }

}

namespace MediaWiki\Auth {

    class AuthManager
    {
        public const ACTION_LOGIN = 'login';

        public function getRequest(): \MediaWiki\Request\WebRequest {}
        public function getAuthenticationSessionData(string $key, mixed $default = null): mixed {}
        public function setAuthenticationSessionData(string $key, mixed $data): void {}
        public function removeAuthenticationSessionData(?string $key): void {}
    }

    abstract class AuthenticationRequest
    {
        public const OPTIONAL = 0;
        public const REQUIRED = 1;
        public const PRIMARY_REQUIRED = 2;

        public int $required = self::REQUIRED;

        public ?string $username = null;

        /**
         * @return array<string, array<string, mixed>>
         */
        abstract public function getFieldInfo();

        /**
         * @template T of AuthenticationRequest
         * @param AuthenticationRequest[] $reqs
         * @param class-string<T> $class
         * @return T|null
         */
        public static function getRequestByClass(array $reqs, string $class, bool $allowSubclasses = false) {}
    }

    class PasswordAuthenticationRequest extends AuthenticationRequest
    {
        public ?string $password = null;

        /**
         * @return array<string, array<string, mixed>>
         */
        public function getFieldInfo() {}
    }

    class AuthenticationResponse
    {
        public const PASS = 'PASS';
        public const FAIL = 'FAIL';
        public const ABSTAIN = 'ABSTAIN';

        public string $status;

        public static function newPass(?string $username = null): self {}
        /**
         * @param string[] $failReasons
         */
        public static function newFail(\MediaWiki\Message\Message $msg, array $failReasons = []): self {}
        public static function newAbstain(): self {}
    }

    interface PrimaryAuthenticationProvider
    {
        public const TYPE_CREATE = 'create';
        public const TYPE_LINK = 'link';
        public const TYPE_NONE = 'none';
    }

    abstract class AbstractPrimaryAuthenticationProvider implements PrimaryAuthenticationProvider
    {
        protected \Psr\Log\LoggerInterface $logger;

        protected AuthManager $manager;

        protected \MediaWiki\User\UserNameUtils $userNameUtils;

        public function getUniqueId(): string {}
    }

}

namespace MediaWiki\SpecialPage\Hook {

    interface AuthChangeFormFieldsHook
    {
        /**
         * @param \MediaWiki\Auth\AuthenticationRequest[] $requests
         * @param array<string, array<string, mixed>> $fieldInfo
         * @param array<string, array<string, mixed>> $formDescriptor
         * @param string $action
         * @return bool|void
         */
        public function onAuthChangeFormFields($requests, $fieldInfo, &$formDescriptor, $action);
    }

}
