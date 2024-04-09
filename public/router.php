<?php
class Router
{
    private array $routes;
    public function register(
        string $requestMethod,
        string $route,
        callable|array $action
    ): self {
        $this->routes[$requestMethod][$route] = $action;
        return $this;
    }
    public function get(string $route, callable|array $action): self
    {
        return $this->register('get', $route, $action);
    }
    public function post(string $route, callable|array $action): self
    {
        return $this->register('post', $route, $action);
    }
    public function routes(): array
    {
        return $this->routes;
    }
    // public function resolve(string $requestUri, string $requestMethod)
    // {
    //     $route = explode('?', $requestUri)[0];

    //     $action = $this->routes[$requestMethod][$route] ?? null;

    //     if(is_callable($action)){
    //         return call_user_func($action);
    //     }
    //     if(is_array($action)){
    //         [$class,$method] = $action;
    //         if(class_exists($class)){
    //             $class = new $class();
    //             if(method_exists($class,$method)){
    //                 return call_user_func_array([$class,$method],[]);
    //             }
    //         }
    //     }
    // }
    public function resolve(string $requestUri, string $requestMethod)
    {
        $route = explode('?', $requestUri)[0];
        $action = isset($this->routes[$requestMethod][$route]) ? $this->routes[$requestMethod][$route] : null;

        // $action = $this->routes[$requestMethod][$route] ?? null;

        if (is_callable($action)) {
            return call_user_func($action);
        }

        if (is_array($action)) {
            [$class, $method] = $action;
            if (class_exists($class)) {
                $classInstance = new $class();
                if (method_exists($classInstance, $method)) {
                    $params = $this->getRouteParams($route);
                    return call_user_func_array([$classInstance, $method], $params);
                }
            }
        }
    }


    private function getRouteParams(string $route): array
    {
        $routeParams = [];
        $pathParts = explode('/', $route);
        foreach ($pathParts as $part) {
            if (strpos($part, '{') !== false && strpos($part, '}') !== false) {
                $paramName = trim($part, '{}');
                $routeParams[] = $_GET[$paramName] ? $_GET[$paramName] : null; // Lấy giá trị từ yêu cầu GET
            }
        }
        return $routeParams;
    }

}
?>