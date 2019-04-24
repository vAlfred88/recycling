<?php

/**
 * @SWG\Get(
 *     tags={"Permission"},
 *     path="/permissions",
 *     summary="Get permissions",
 *     description="Get permissions list",
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
 *     tags={"Permission"},
 *     path="/permissions",
 *     summary="Create a permissions",
 *     description="Create new permissions into database",
 *     @SWG\Parameter(
 *         name="Permission",
 *         in="body",
 *         required=true,
 *         @SWG\Schema(
 *             @SWG\Property(
 *                 property="name",
 *                 type="string"
 *             ),
 *              @SWG\Property(
 *                 property="label",
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
 *     tags={"Permission"},
 *     path="/permissions/{permissions}",
 *     summary="Get permissions",
 *     description="Get one permissions by id",
 *     @SWG\Parameter(
 *         description="Permission id",
 *         in="path",
 *         name="permissions",
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
 *     tags={"Permission"},
 *     path="/permissions/{permissions}",
 *     summary="Update permissions",
 *     description="Update permissions",
 *     @SWG\Parameter(
 *         description="Permission id",
 *         in="path",
 *         name="permissions",
 *         required=true,
 *         type="integer",
 *         format="int32"
 *     ),
 *     @SWG\Parameter(
 *         name="Permission",
 *         in="body",
 *         required=true,
 *         @SWG\Schema(
 *           @SWG\Property(
 *                 property="name",
 *                 type="string"
 *             ),
 *              @SWG\Property(
 *                 property="label",
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
 *     tags={"Permission"},
 *     path="/permissions/{permissions}",
 *     summary="Delete permissions",
 *     description="Delete permissions by id",
 *     @SWG\Parameter(
 *         description="Permission id",
 *         in="path",
 *         name="permissions",
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
