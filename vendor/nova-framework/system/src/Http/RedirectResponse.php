<?php

namespace Nova\Http;

use Nova\Session\Store as SessionStore;
use Nova\Support\MessageBag;
use Nova\Support\ViewErrorBag;
use Nova\Support\Contracts\MessageProviderInterface;
use Nova\Support\Str;

use Symfony\Component\HttpFoundation\Cookie as SymfonyCookie;
use Symfony\Component\HttpFoundation\RedirectResponse as SymfonyRedirectResponse;
use Symfony\Component\HttpFoundation\File\UploadedFile;


class RedirectResponse extends SymfonyRedirectResponse
{
    /**
     * The request instance.
     *
     * @var \Http\Request
     */
    protected $request;

    /**
     * The session store implementation.
     *
     * @var \Nova\Session\Store
     */
    protected $session;

    /**
     * Set a header on the Response.
     *
     * @param  string  $key
     * @param  string  $value
     * @param  bool  $replace
     * @return $this
     */
    public function header($key, $value, $replace = true)
    {
        $this->headers->set($key, $value, $replace);

        return $this;
    }

    /**
     * Flash a piece of data to the session.
     *
     * @param  string  $key
     * @param  mixed   $value
     * @return \Nova\Http\RedirectResponse
     */
    public function with($key, $value = null)
    {
        $key = is_array($key) ? $key : [$key => $value];

        foreach ($key as $k => $v) {
            $this->session->flash($k, $v);
        }

        return $this;
    }

    /**
     * Add a cookie to the response.
     *
     * @param  \Symfony\Component\HttpFoundation\Cookie  $cookie
     * @return $this
     */
    public function withCookie(SymfonyCookie $cookie)
    {
        $this->headers->setCookie($cookie);

        return $this;
    }

    /**
     * Add multiple cookies to the response.
     *
     * @param  array  $cookie
     * @return $this
     */
    public function withCookies(array $cookies)
    {
        foreach ($cookies as $cookie)
        {
            $this->headers->setCookie($cookie);
        }

        return $this;
    }

    /**
     * Flash an array of input to the session.
     *
     * @param  array  $input
     * @return $this
     */
    public function withInput(array $input = null)
    {
        $input = $input ?: $this->request->input();

        $this->session->flashInput(array_filter($input, function ($value)
        {
            return ! $value instanceof UploadedFile;
        }));

        return $this;
    }

    /**
     * Flash an array of input to the session.
     *
     * @param  mixed  string
     * @return $this
     */
    public function onlyInput()
    {
        return $this->withInput($this->request->only(func_get_args()));
    }

    /**
     * Flash an array of input to the session.
     *
     * @param  mixed  string
     * @return \Nova\Http\RedirectResponse
     */
    public function exceptInput()
    {
        return $this->withInput($this->request->except(func_get_args()));
    }

    /**
     * Flash a array containing a message to the session.
     *
     * @param string $message
     * @param string $type
     *
     * @return \Nova\Http\RedirectResponse
     */
    public function withStatus($message, $type = 'success')
    {
        $status = array('type' => $type, 'text' => $message);

        $this->session->push('status', $status);

        return $this;
    }

    /**
     * Flash a container of errors to the session.
     *
     * @param  \Nova\Support\Contracts\MessageProviderInterface|array  $provider
     * @param  string  $key
     * @return $this
     */
    public function withErrors($provider, $key = 'default')
    {
        $value = $this->parseErrors($provider);

        $this->session->flash(
            'errors', $this->session->get('errors', new ViewErrorBag)->put($key, $value)
        );

        return $this;
    }

    /**
     * Parse the given errors into an appropriate value.
     *
     * @param  \Nova\Support\Contracts\MessageProviderInterface|array  $provider
     * @return \Nova\Support\MessageBag
     */
    protected function parseErrors($provider)
    {
        if ($provider instanceof MessageProviderInterface) {
            return $provider->getMessageBag();
        }

        return new MessageBag((array) $provider);
    }

    /**
     * Get the request instance.
     *
     * @return  \Nova\Http\Request
     */
    public function getRequest()
    {
        return $this->request;
    }

    /**
     * Set the request instance.
     *
     * @param  \Nova\Http\Request  $request
     * @return void
     */
    public function setRequest(Request $request)
    {
        $this->request = $request;
    }

    /**
     * Get the session store implementation.
     *
     * @return \Session\Store
     */
    public function getSession()
    {
        return $this->session;
    }

    /**
     * Set the session store implementation.
     *
     * @param  \Session\Store  $session
     * @return void
     */
    public function setSession(SessionStore $session)
    {
        $this->session = $session;
    }

    /**
     * Dynamically bind flash data in the session.
     *
     * @param  string  $method
     * @param  array  $parameters
     * @return void
     *
     * @throws \BadMethodCallException
     */
    public function __call($method, $parameters)
    {
        if (starts_with($method, 'with')) {
            return $this->with(Str::snake(substr($method, 4)), $parameters[0]);
        }

        throw new \BadMethodCallException("Method [$method] does not exist on Redirect.");
    }

}
