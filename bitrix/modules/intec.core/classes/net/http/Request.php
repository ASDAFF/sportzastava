<?php
namespace intec\core\net\http;

use intec\Core;
use intec\core\base\Object;
use intec\core\data\collections\Scalars;
use intec\core\helpers\ArrayHelper;
use intec\core\helpers\Type;
use intec\core\helpers\RegExp;
use intec\core\net\Url;

/**
 * Class Request
 * @property Scalars $headers
 * @property Scalars $cookies
 * @property Scalars $get
 * @property Scalars $post
 * @property bool $isPost
 * @property Proxy $proxy
 * @property integer|null $jumps
 * @package core\helpers
 */
class Request extends Object
{
    /** @var Scalars $_headers */
    protected $_headers;
    /** @var Scalars $_cookies */
    protected $_cookies;
    /** @var Scalars $_get */
    protected $_get;
    /** @var Scalars $_post */
    protected $_post;

    /** @var bool $_ssl */
    protected $_verifySSL;
    /** @var Proxy $_proxy */
    protected $_proxy;
    /** @var integer|null $_jumps */
    protected $_jumps = null;
    /** @var integer|null $_timeout */
    protected $_timeout = null;

    /**
     * Request constructor.
     */
    public function __construct() {
        $this->_headers = new Scalars();
        $this->_cookies = new Scalars();
        $this->_get = new Scalars();
        $this->_post = new Scalars();
        $this->_proxy = new Proxy();
        $this->_verifySSL = false;

        parent::__construct([]);
    }

    /**
     * Коллекция заголовков.
     *
     * @return Scalars
     */
    public function getHeaders() {
        return $this->_headers;
    }

    /**
     * Коллекция кук.
     *
     * @return Scalars
     */
    public function getCookies() {
        return $this->_cookies;
    }

    /**
     * Коллекция get параметров.
     *
     * @return Scalars
     */
    public function getGet() {
        return $this->_get;
    }

    /**
     * Коллекция post параметров.
     *
     * @return Scalars
     */
    public function getPost() {
        return $this->_post;
    }

    /**
     * Является ли запрос POST-запросом.
     *
     * @return bool
     */
    public function getIsPost() {
        return !$this->getPost()->isEmpty();
    }

    /**
     * Использовать прокси сервер.
     *
     * @param Proxy|null $proxy
     * @return Request
     */
    public function setProxy($proxy = null) {
        if ($proxy instanceof Proxy) {
            $this->_proxy = $proxy;
        } else {
            $this->_proxy = new Proxy();
        }

        return $this;
    }

    /**
     * Возвращает прокси.
     *
     * @return Proxy
     */
    public function getProxy() {
        return $this->_proxy;
    }

    /**
     * Идти ли по редиректам. Если 0 то бесконечно
     *
     * @param integer $limit
     * @return Request
     */
    public function setJumps($limit = 20) {
        $this->_jumps = null;

        if (Type::isNumeric($limit)) {
            $this->_jumps = $limit < 0 ? 0 : Type::toInteger($limit);
        }

        return $this;
    }

    /**
     * Возвращает количество прыжков.
     *
     * @return integer|null
     */
    public function getJumps() {
        return $this->_jumps;
    }

    /**
     * Устанавливает таймаут.
     *
     * @param integer $timeout
     * @return Request
     */
    public function setTimeout($timeout = null) {
        $this->_timeout = null;

        if (Type::isNumeric($timeout)) {
            $this->_timeout = $timeout < 1 ? 1 : Type::toInteger($timeout);
        }

        return $this;
    }

    /**
     * Возвращает таймаут.
     *
     * @return integer|null
     */
    public function getTimeout() {
        return $this->_timeout;
    }

    /**
     * Устанавливает опцию проверки ssl.
     * @param null $value
     * @return static|bool
     */
    public function verifySSL($value = null) {
        if ($value !== null) {
            $this->_verifySSL = Type::toBoolean($value);
            return $this;
        }

        return $this->_verifySSL;
    }

    public function send($url) {
        /** Храним все куки на протяжении всех редиректов и позже ложим их в Response */
        $cookies = new Scalars($this->getCookies());
        $proxy = $this->_proxy;
        $jumps = 0;

        /** Регулярное выражения для парсинга кук */
        $eCookie = (new RegExp('^Set-Cookie:(.*?);'))
            ->isInsensitive(true)
            ->isMultiLine(true)
            ->isDotAll(true);

        /** Регулярное выражение для парсинга заголовков типа Имя: Значение */
        $eHeader = (new RegExp('^(.+?):(.+)'))
            ->isMultiLine(true)
            ->isDotAll(true);

        /** Регулярное выражение для парсинга версии http и кода ответа */
        $eMain = (new RegExp('^HTTP\/(\d+\.\d+) (\d+) (.*)'));

        /** Рекурсивная функция */
        $function = function ($url, $get = [], $post = []) use (&$cookies, &$function, &$eCookie, &$eHeader, &$eMain, &$jumps, &$proxy) {
            /** Обнуляем переменные для новой итерации зхапроса */
            $headers = new Scalars();
            $code = null;
            $version = null;
            $message = null;
            $content = null;
            $url = new Url($url);

            /** Формируем заголовки для отправки */
            $headersSent = $this->getHeaders()->asArray();

            $context = [];
            $context['http'] = [];
            $context['ssl'] = [
                "verify_peer" => $this->verifySSL(),
                "verify_peer_name" => $this->verifySSL(),
            ];

            $context['http']['header'] = [];
            /** Отключаем встроенную функцию следования по Location */
            $context['http']['follow_location'] = false;

            /** Если есть параметры POST или файлы */
            if (!empty($post) || !empty($files)) {
                /** Устанавливаем что метод POST */
                $context['http']['method'] = 'POST';

                /** Если нет файлов, отсылаем простой POST */
                if (empty($files)) {
                    /** Устанавливаем простой тип данных для POST */
                    $headersSent['Content-Type'] = 'application/x-www-form-urlencoded';
                    /** Устанавливаем параметры */
                    $context['http']['content'] = Url::buildQueryString($post);
                } else {
                    $boundary = Core::$app->security->generateRandomString(20);
                    /** Устанавливаем multipart тип данных для POST */
                    $headersSent['Content-Type'] = 'multipart/form-data; boundary='.$boundary;
                    $context['http']['content'] = '';

                    /** Формирование POST параметров */
                    foreach ($post as $key => $value) {
                        $context['http']['content'] .= '--'.$boundary."\r\n";
                        $context['http']['content'] .= 'Content-Disposition: form-data; name="'.Url::encode($key).'"'."\r\n"."\r\n";
                        $context['http']['content'] .= $value;
                    }
                }
            } else {
                /** Устанавливаем что метод GET */
                $context['http']['method'] = 'GET';
            }

            /** Если можно подключиться по прокси */
            if ($proxy->canConnect()){
                $context['http']['proxy'] = 'tcp://'.$this->_proxy->getFullAddress();
                $context['http']['request_fulluri'] = true;

                if ($proxy->canAuthorize()) {
                    $authorization = $proxy->getLogin().':'.$proxy->getPassword();
                    $headersSent['Proxy-Authorization'] = 'Basic '.base64_encode($authorization);
                }
            }

            /** Устанавливаем get параметры в url */
            $url->getQuery()->setRange($get);

            /** Если куки не пусты, то тоже их отправляем */
            if (!$cookies->isEmpty()) {
                $headersSent['Cookie'] = implode('; ',
                    $cookies->asArray(function ($key, $item) {
                        /** Формируем массив из таких элементов */
                        return ['value' => Url::encode($key, true).'='.Url::encode($item, true)];
                    })
                );
            }

            /** Устанавливаем главный заголовок (пример: GET /путь/до/страницы HTTP/1.0) */
            //$context['http']['header'][] = $context['http']['method'].' '.$url->getPathString().' HTTP/1.0';

            /**
             * Добавляем заголовки для отправки.
             *
             * @var string $key
             * @var string $header
             */
            foreach ($headersSent as $key => $header) {
                $context['http']['header'][] = $key.': '.$header;
            }

            /** Устанавливаем таймаут */
            if (!empty($this->_timeout))
                $context['http']['timeout'] = $this->_timeout;

            /** Генерируем контекст для отправки */
            $context = stream_context_create($context);
            /** Берем контент */
            $content = @file_get_contents($url, null, $context);

            /** Если заголовки не пустые, то парсим их */
            if (!empty($http_response_header)) {
                foreach ($http_response_header as $header) {
                    if ($eCookie->isMatch($header)) { /** Если это Set-Cookie то длбавляем их в коллекцию */
                        $cookie = $eCookie->match($header, 1);
                        $cookie = explode('=', $cookie);
                        $cookies->set(
                            Url::decode(trim(ArrayHelper::getValue($cookie, 0)), true),
                            Url::decode(trim(ArrayHelper::getValue($cookie, 1)), true)
                        );
                    } else if ($eHeader->isMatch($header)) { /** Если это заголовок то добавляем его в коллекцию */
                        $headers->set(
                            Url::decode($eHeader->match($header, 1), true),
                            Url::decode(trim($eHeader->match($header, 2)), true)
                        );
                        unset($headerName, $headerValue);
                    } else if ($eMain->isMatch($header)) { /** Если это главный заголовок, то разбираем его на части */
                        $headers->add($header);
                        $version = $eMain->match($header, 1);
                        $code = $eMain->match($header, 2);
                        $message = $eMain->match($header, 3);
                    }
                }

                /** Если Location существует и не превышено количество прыжков, то идем в новый адрес */
                if ($headers->exists('Location') && $this->_jumps !== null)
                    if ($this->_jumps == 0 || $jumps < $this->_jumps) {
                        $jumps++; /** Увеличиваем прыжки */
                        return $function($headers->get('Location'));
                    }
            }

            /** Формируем ответ и отдаем */
            $response = new Response($code, $version, $message, $content);
            $response->getCookies()->setRange($cookies);
            $response->getHeaders()->setRange($headers);

            return $response;
        };

        $response = $function(
            $url,
            $this->getGet()->asArray(),
            $this->getPost()->asArray()
        );

        return $response;
    }
}