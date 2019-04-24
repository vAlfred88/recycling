<?php

/**
 * @SWG\Get(
 *     tags={"Service"},
 *     path="/services",
 *     summary="Get services",
 *     description="Get services list",
 *
 *     @SWG\Response(response=200, description="OK: The request has succeeded."),
 *     @SWG\Response(response=401, description="UNAUTHORIZED: Authentication required."),
 *     @SWG\Response(response=403, description="FORBIDDEN: You do not have the necessary rights."),
 *     @SWG\Response(response=422, description="UNPROCESSABLE ENTITY: Request validations error."),
 *     @SWG\Response(response=500, description="INTERNAL SERVER ERROR"),
 *     security={{"Bearer":{}}}
 * )
 *
 * @SWG\Post(
 *     tags={"Service"},
 *     path="/services",
 *     summary="Create a service",
 *     description="Create new service into database",
 *     @SWG\Parameter(
 *         name="Service",
 *         in="body",
 *         required=true,
 *         @SWG\Schema(
 *             @SWG\Property(
 *                 property="name",
 *                 type="string"
 *             ),
 *         )
 *     ),
 *     @SWG\Response(response=201, description="OK: The request has succeeded."),
 *     @SWG\Response(response=401, description="UNAUTHORIZED: Authentication required."),
 *     @SWG\Response(response=403, description="FORBIDDEN: You do not have the necessary rights."),
 *     @SWG\Response(response=422, description="UNPROCESSABLE ENTITY: Request validations error."),
 *     @SWG\Response(response=500, description="INTERNAL SERVER ERROR"),
 *     security={{"Bearer":{}}}
 * )
 *
 * @SWG\Get(
 *     tags={"Service"},
 *     path="/services/{service}",
 *     summary="Get service",
 *     description="Get one service by id",
 *     @SWG\Parameter(
 *         description="Service id",
 *         in="path",
 *         name="service",
 *         required=true,
 *         type="integer",
 *         format="int32"
 *     ),
 *     @SWG\Response(response=200, description="OK: The request has succeeded."),
 *     @SWG\Response(response=401, description="UNAUTHORIZED: Authentication required."),
 *     @SWG\Response(response=403, description="FORBIDDEN: You do not have the necessary rights."),
 *     @SWG\Response(response=500, description="INTERNAL SERVER ERROR"),
 *     security={{"Bearer":{}}}
 * )
 *
 * @SWG\Put(
 *     tags={"Service"},
 *     path="/services/{service}",
 *     summary="Update service",
 *     description="Update service",
 *     @SWG\Parameter(
 *         description="Service id",
 *         in="path",
 *         name="service",
 *         required=true,
 *         type="integer",
 *         format="int32"
 *     ),
 *     @SWG\Parameter(
 *         name="Service",
 *         in="body",
 *         required=true,
 *         *         @SWG\Schema(
 *             @SWG\Property(
 *                 property="name",
 *                 type="string"
 *             ),
 *         )
 *     ),
 *     @SWG\Response(response=200, description="OK: The request has succeeded."),
 *     @SWG\Response(response=401, description="UNAUTHORIZED: Authentication required."),
 *     @SWG\Response(response=403, description="FORBIDDEN: You do not have the necessary rights."),
 *     @SWG\Response(response=422, description="UNPROCESSABLE ENTITY: Request validations error."),
 *     @SWG\Response(response=500, description="INTERNAL SERVER ERROR"),
 *     security={{"Bearer":{}}}
 * )
 *
 * @SWG\Delete(
 *     tags={"Service"},
 *     path="/services/{service}",
 *     summary="Delete service",
 *     description="Delete service by id",
 *     @SWG\Parameter(
 *         description="Service id",
 *         in="path",
 *         name="service",
 *         required=true,
 *         type="integer",
 *         format="int32"
 *     ),
 *     @SWG\Response(response=200, description="OK: The request has succeeded."),
 *     @SWG\Response(response=401, description="UNAUTHORIZED: Authentication required."),
 *     @SWG\Response(response=403, description="FORBIDDEN: You do not have the necessary rights."),
 *     @SWG\Response(response=500, description="INTERNAL SERVER ERROR"),
 *     security={{"Bearer":{}}}
 * )

 */
